# lottery-result-bundle
##Symfony LotteryResultBundle with Curl on millipiyango.gov.tr for Turkey lottery

###http://www.sanssende.com tarafından oluşturulmuş ve geliştirilen bir symfony bundle'ıdır.

>Şu anki sürüm unstable (kararsız) bir sürümdür, tüm yapı çalışıyor olsa dahi class ve/veya method isimlerinde tutarsızlıklar olabilir.
>Daha sonraki güncellemelerde class ve/veya method isimler değişmesi muhtemeldir.
>Kararlı bir sürüme geçildiğinde nasıl çalıştığı paylaşılacaktır.

Composer ile Kurulum
-------------
composer.json dosyasında require anahtarının altına aşağıdaki tanımlamayı yapmanız yeterlidir.

``` json
# composer.json

"require": {
        "sanssendecom/lottery-result-bundle": "1.0.*@dev"
    },

```

Servisleri kullanabilmek için 

``` yaml
# app/config/config.yml

imports:
    - { resource: @LotteryResultBundle/Resources/config/services.yml }
``` 

Controller erişimi
-------------
Aşağıdaki gibi bir tanımlama yaparak "/lottery" adresinden index sayfasına erişerek bundle'ı test edebilirsiniz.

``` yaml
# app/config/routing.yml

_lottey_bundle:
    resource: "@LotteryResultBundle/Resources/config/routing.yml"
``` 