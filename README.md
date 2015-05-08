# lottery-result
Symfony LotteryResultBundle with Curl on millipiyango.gov.tr for Turkey lottery

http://www.sanssende.com tarafından oluşturulmuş ve geliştirilen bir symfony bundle'ıdır.

Şu anki sürüm unstable (kararsız) bir sürümdür, tüm yapı çalışıyor olsa dahi class ve/veya method isimlerinde tutarsızlıklar olabilir.
Daha sonraki güncellemelerde class ve/veya method isimler değişmesi muhtemeldir.
Kararlı bir sürüme geçildiğinde nasıl çalıştığı paylaşılacaktır.

Kurulum için composer'ı kullanabilirsiniz

composer.json dosyasına

require anahtarının altına aşağıdaki tanımlamayı yapmanız yeterlidir.

"denizakturk/lottery-result": "1.0.*@dev"


Controller kısmına erişmek için;

app/config/routing.yml dosyasına

_lottey_bundle:
    resource: "@LotteryResultBundle/Resources/config/routing.yml"
    
tanımlamayı yapmanız yeterlidir, daha sonrasında "/lottery" adresini kullanarak controller'a erişebilirsiniz, daha fazla ayrıntı için bundle altındaki config/routing.yml dosyasına bakabilirsiniz. 


Servisleri kullanabilmek için 

app/config/config.yml dosyasına

imports:
    - { resource: @LotteryResultBundle/Resources/config/services.yml }

şeklinde tanımlamanız yeterli olacaktır.