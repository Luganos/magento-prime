# Russian Language Pack for Magento 2

Перевод интерфейса Magento 2 на русский язык.


# Installation

## Установка через composer.json:

Запустите следующую команду в корневой папке Magento 2

    composer require etws/magento-language-ru_ru:*
    
или
    
    composer require etws/magento-language-ru_ru:dev-develop

Не забудьте очистить кэш

    bin/magento cache:clean
    
Для некоторых фраз (в основном JS) помогает стирание статичных файлов
    
    rm -rf var/view_preprocessed/ pub/static/


# Помощь с переводом

Мы не профессиональные переводчики и поддерживаем перевод в силу своих возможностей и требований.
Если вы хотите помочь улучшить этот перевод, то в файле CONTRIBUTE.md вы узнаете, как именно можете помочь.


# Готовность перевода

| | | |
|-|-|-|
|**Общий прогресс**|6862/8162|![Progress](http://progressed.io/bar/84)|

## Темы

| | | |
|-|-|-|
|frontend/Magento/luma|45/45|![Progress](http://progressed.io/bar/100)|
|frontend/Magento/blank|7/7|![Progress](http://progressed.io/bar/100)|

## Модули

| | | |
|-|-|-|
|Magento_AdminNotification|49/49|![Progress](http://progressed.io/bar/100)|
|Magento_AdvancedPricingImportExport|5/5|![Progress](http://progressed.io/bar/100)|
|Magento_Authorization|3/3|![Progress](http://progressed.io/bar/100)|
|Magento_Authorizenet|51/68|![Progress](http://progressed.io/bar/75)|
|Magento_Backend|427/457|![Progress](http://progressed.io/bar/93)|
|Magento_Backup|83/87|![Progress](http://progressed.io/bar/95)|
|Magento_Braintree|95/127|![Progress](http://progressed.io/bar/75)|
|Magento_Bundle|91/96|![Progress](http://progressed.io/bar/95)|
|Magento_Captcha|25/25|![Progress](http://progressed.io/bar/100)|
|Magento_CatalogImportExport|13/22|![Progress](http://progressed.io/bar/59)|
|Magento_CatalogInventory|60/61|![Progress](http://progressed.io/bar/98)|
|Magento_CatalogRule|81/81|![Progress](http://progressed.io/bar/100)|
|Magento_CatalogSearch|36/37|![Progress](http://progressed.io/bar/97)|
|Magento_CatalogUrlRewrite|6/6|![Progress](http://progressed.io/bar/100)|
|Magento_CatalogWidget|20/20|![Progress](http://progressed.io/bar/100)|
|Magento_Catalog|637/723|![Progress](http://progressed.io/bar/88)|
|Magento_CheckoutAgreements|39/39|![Progress](http://progressed.io/bar/100)|
|Magento_Checkout|152/161|![Progress](http://progressed.io/bar/94)|
|Magento_Cms|152/154|![Progress](http://progressed.io/bar/99)|
|Magento_Config|77/96|![Progress](http://progressed.io/bar/80)|
|Magento_ConfigurableProduct|100/133|![Progress](http://progressed.io/bar/75)|
|Magento_Contact|25/25|![Progress](http://progressed.io/bar/100)|
|Magento_Cookie|13/15|![Progress](http://progressed.io/bar/87)|
|Magento_Cron|18/20|![Progress](http://progressed.io/bar/90)|
|Magento_CurrencySymbol|18/18|![Progress](http://progressed.io/bar/100)|
|Magento_CustomerImportExport|19/20|![Progress](http://progressed.io/bar/95)|
|Magento_Customer|436/490|![Progress](http://progressed.io/bar/89)|
|Magento_Deploy|1/1|![Progress](http://progressed.io/bar/100)|
|Magento_Developer|9/9|![Progress](http://progressed.io/bar/100)|
|Magento_Dhl|39/80|![Progress](http://progressed.io/bar/49)|
|Magento_Directory|43/46|![Progress](http://progressed.io/bar/93)|
|Magento_DownloadableImportExport|5/5|![Progress](http://progressed.io/bar/100)|
|Magento_Downloadable|94/112|![Progress](http://progressed.io/bar/84)|
|Magento_Eav|88/142|![Progress](http://progressed.io/bar/62)|
|Magento_Email|89/104|![Progress](http://progressed.io/bar/86)|
|Magento_EncryptionKey|14/15|![Progress](http://progressed.io/bar/93)|
|Magento_Fedex|32/74|![Progress](http://progressed.io/bar/43)|
|Magento_GiftMessage|31/37|![Progress](http://progressed.io/bar/84)|
|Magento_GoogleAdwords|13/13|![Progress](http://progressed.io/bar/100)|
|Magento_GoogleOptimizer|7/7|![Progress](http://progressed.io/bar/100)|
|Magento_GroupedProduct|21/22|![Progress](http://progressed.io/bar/95)|
|Magento_ImportExport|87/116|![Progress](http://progressed.io/bar/75)|
|Magento_Indexer|20/22|![Progress](http://progressed.io/bar/91)|
|Magento_Integration|43/109|![Progress](http://progressed.io/bar/39)|
|Magento_LayeredNavigation|28/28|![Progress](http://progressed.io/bar/100)|
|Magento_Marketplace|15/15|![Progress](http://progressed.io/bar/100)|
|Magento_MediaStorage|21/25|![Progress](http://progressed.io/bar/84)|
|Magento_Msrp|16/18|![Progress](http://progressed.io/bar/89)|
|Magento_Multishipping|83/89|![Progress](http://progressed.io/bar/93)|
|Magento_Newsletter|145/147|![Progress](http://progressed.io/bar/99)|
|Magento_OfflinePayments|21/23|![Progress](http://progressed.io/bar/91)|
|Magento_OfflineShipping|50/50|![Progress](http://progressed.io/bar/100)|
|Magento_PageCache|11/17|![Progress](http://progressed.io/bar/65)|
|Magento_Payment|38/50|![Progress](http://progressed.io/bar/76)|
|Magento_Paypal|283/567|![Progress](http://progressed.io/bar/50)|
|Magento_Persistent|15/17|![Progress](http://progressed.io/bar/88)|
|Magento_ProductAlert|37/38|![Progress](http://progressed.io/bar/97)|
|Magento_ProductVideo|38/40|![Progress](http://progressed.io/bar/95)|
|Magento_Quote|47/55|![Progress](http://progressed.io/bar/85)|
|Magento_Reports|204/223|![Progress](http://progressed.io/bar/91)|
|Magento_Review|128/134|![Progress](http://progressed.io/bar/96)|
|Magento_Rss|7/7|![Progress](http://progressed.io/bar/100)|
|Magento_Rule|35/35|![Progress](http://progressed.io/bar/100)|
|Magento_SalesRule|149/152|![Progress](http://progressed.io/bar/98)|
|Magento_SalesSequence|2/2|![Progress](http://progressed.io/bar/100)|
|Magento_Sales|688/788|![Progress](http://progressed.io/bar/87)|
|Magento_Search|54/54|![Progress](http://progressed.io/bar/100)|
|Magento_SendFriend|49/49|![Progress](http://progressed.io/bar/100)|
|Magento_Shipping|157/179|![Progress](http://progressed.io/bar/88)|
|Magento_Sitemap|67/67|![Progress](http://progressed.io/bar/100)|
|Magento_Store|28/34|![Progress](http://progressed.io/bar/82)|
|Magento_Swatches|12/25|![Progress](http://progressed.io/bar/48)|
|Magento_TaxImportExport|20/20|![Progress](http://progressed.io/bar/100)|
|Magento_Tax|173/178|![Progress](http://progressed.io/bar/97)|
|Magento_Theme|142/157|![Progress](http://progressed.io/bar/90)|
|Magento_Translation|5/5|![Progress](http://progressed.io/bar/100)|
|Magento_Ui|76/88|![Progress](http://progressed.io/bar/86)|
|Magento_Ups|40/112|![Progress](http://progressed.io/bar/36)|
|Magento_UrlRewrite|61/63|![Progress](http://progressed.io/bar/97)|
|Magento_User|129/133|![Progress](http://progressed.io/bar/97)|
|Magento_Usps|41/130|![Progress](http://progressed.io/bar/32)|
|Magento_Variable|21/21|![Progress](http://progressed.io/bar/100)|
|Magento_Webapi|20/20|![Progress](http://progressed.io/bar/100)|
|Magento_Weee|26/29|![Progress](http://progressed.io/bar/90)|
|Magento_Widget|69/72|![Progress](http://progressed.io/bar/96)|
|Magento_Wishlist|139/139|![Progress](http://progressed.io/bar/100)|
|Magento_GoogleAnalytics|5/5|![Progress](http://progressed.io/bar/100)|
|Magento_NewRelicReporting|12/20|![Progress](http://progressed.io/bar/60)|
|Magento_DesignEditor|2/2|![Progress](http://progressed.io/bar/100)|
|Magento_Log|2/2|![Progress](http://progressed.io/bar/100)|
|Magento_WebapiSecurity|0/2|![Progress](http://progressed.io/bar/0)|

## Библиотеки

| | | |
|-|-|-|
|lib/web/mage/adminhtml/backup.js|4/4|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/adminhtml/wysiwyg/widget.js|3/3|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/backend/suggest.js|3/3|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/decorate.js|1/1|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/dropdown.js|1/1|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/loader.js|2/2|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/loader_old.js|2/2|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/menu.js|2/2|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/translate-inline-vde.js|2/2|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/translate-inline.js|3/3|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/validation.js|4/4|![Progress](http://progressed.io/bar/100)|
|lib/web/mage/validation/validation.js|4/4|![Progress](http://progressed.io/bar/100)|