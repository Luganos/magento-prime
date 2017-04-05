<?php
namespace Novaposhta\Shipping\Model\Carrier;
 
use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
 
class Novaposhta extends \Magento\Shipping\Model\Carrier\AbstractCarrier implements
    \Magento\Shipping\Model\Carrier\CarrierInterface
{
    /**
     * @var string
     */
    protected $_code = 'example';
    
    protected $_rateResultFactory;
    
    protected $_rateMethodFactory;
    
    protected $_cart;
    
    protected $_productRepo;
 
    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory
     * @param \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        \Magento\Checkout\Model\Cart $cart, 
        \Magento\Catalog\Model\ProductRepository $productRepo,  
        \Magento\Framework\App\State $appState,    
        array $data = []
    ) {
        $this->_cart = $cart;
        $this->_productRepo = $productRepo;
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }
 
    /**
     * @return array
     */
    public function getAllowedMethods()
    {
        return ['example' => $this->getConfigData('name')];
    }
    
    
    /**
     * @param RateRequest $request
     * @return bool|Result
     */
    public function collectRates(RateRequest $request)
    {
        if (!$this->getConfigFlag('active')) {
            return false;
        }
        
        $Quote= $this->getCartContent();
        
 
        /** @var \Magento\Shipping\Model\Rate\Result $result */
        $result = $this->_rateResultFactory->create();
 
        /** @var \Magento\Quote\Model\Quote\Address\RateResult\Method $method */
        $method = $this->_rateMethodFactory->create();
 
        $method->setCarrier('example');
        $method->setCarrierTitle($this->getConfigData('title'));
 
        $method->setMethod('example');
        $method->setMethodTitle($this->getConfigData('name'));
 
        /*you can fetch shipping price from different sources over some APIs, we used price from config.xml - xml node price*/
        $amount = $this->getConfigData('price');
 
        $method->setPrice($amount);
        $method->setCost($amount);
 
        $result->append($method);
 
        return $result;
    }
    
    
    /** Get list of products inside cart
     * @return array $product
     */
    private function getCartContent() 
    {
        
        $quotes= $this->_cart->getQuote()->getAllVisibleItems();
        
        $product_list = array();
        
        foreach ($quotes as $item) {
            
            $product = $item->getProduct();
            
            $data = $this->getProductById($product->getId());
            
            $product_list[$product->getId()] = array(
                    'weight' => (NULL !== $data->getData('weight'))?  $data->getData('weight'): 0,
                    'length' => (NULL !== $data->getData('length'))?  $data->getData('length'): 0,
                    'width' => (NULL !== $data->getData('width'))?  $data->getData('width'): 0,
                    'height' => (NULL !== $data->getData('height'))?  $data->getData('height'): 0
                
            );
        }
        
        return $product_list;
        
    }
    
    private function getCityRefByName($name)
    {
        $xml = '<?xml version="1.0" encoding="utf-8" ?>';
        $xml .= '<file>';
        $xml .= '<apiKey>' . $this->getConfigData('api_key') . '</apiKey>';
        $xml .= '<modelName>Address</modelName>';
        $xml .= '<calledMethod>getCities</calledMethod>';
        $xml .= '</file>';

        $response = $this->getResult($xml);

        if ($response) {
            $xml = simplexml_load_string($response);

            foreach ($xml->data->item as $city) {
                if ($this->currentLanguage() == 'ru') {
                    $cityName = $city->DescriptionRu;
                } else {
                    $cityName = $city->Description;
                }
                if ($cityName == $name) {
                    return $city->Ref;
                }
            }
        }
        return '';
    }
    
    
    /** Get list of exisiting warehouse for certain city
     * @param string $city
     * @return array $json
     */
    private function getWarehouses($city)
    {
        $json = array();
        if (isset($city) && $this->getConfigData('api_key')) {
            $xml = '<?xml version="1.0" encoding="utf-8" ?>';
            $xml .= '<file>';
            $xml .= '<apiKey>' . $this->getConfigData('api_key') . '</apiKey>';
            $xml .= '<modelName>Address</modelName>';
            $xml .= '<calledMethod>getWarehouses</calledMethod>';
            $xml .= '<methodProperties>';
            $xml .= '<CityRef>' . $this->getCityRefByName(trim($city)) . '</CityRef>';
            $xml .= '</methodProperties>';
            $xml .= '</file>';

            $response = $this->getResult($xml);

            if ($response) {
                $xml = simplexml_load_string($response);

                foreach ($xml->data->item as $warehouse) {
                    if ($this->currentLanguage() == 'ru') {
                        $json[] = array(
                            'warehouse' => (string)str_replace(array('"', "'"), '', $warehouse->DescriptionRu),
                            'number' => (string)str_replace(array('"', "'"), '', $warehouse->Number),
                        );
                    } else {
                        $json[] = array(
                            'warehouse' => (string)str_replace(array('"', "'"), '', $warehouse->Description),
                            'number' => (string)str_replace(array('"', "'"), '', $warehouse->Number),
                        );
                    }
                }
            }
        }

        return $json;
    } 
    
   /** Send request using CURL library
     * @param string $request
     * @return string $responce
     */
    private function getResult($request)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getConfigData('api_key'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
    
    
    /** Get current language
     * @return string 
     */
    private function currentLanguage() {
        
	/** @var \Magento\Framework\ObjectManagerInterface $om */
	$om = \Magento\Framework\App\ObjectManager::getInstance();
        
	/** @var \Magento\Framework\Locale\Resolver $resolver */
	$resolver = $om->get('Magento\Framework\Locale\Resolver');
        
        $code = strtok(strval($resolver->getLocale()), "_");
        
	return $code;
    }
    
    /**
     * Load product from productId
     * @param int $id
     * @return $this
     */
     private function getProductById($id)
     {
        return $this->_productRepo->getById($id);
     }
}

