<?php

namespace Pp\Kistochki\Database\Seeds;

use Str;
use Seeder;
use Pp\Kistochki\Models\Category;
use Pp\Kistochki\Models\Service;

class SeedServicesTable extends Seeder
{
    public function run()
    {
        $services = $this->getServices();

        foreach ($services as $service) {
            $model = Service::create([
                'title' => $service['title'],
                'description' => $service['comment'],
                'slug' => Str::slug($service['title']),
                // 'price' => $service['price_max'],
                'status' => 1,
            ]);

            $category = $this->getServiceCategory($service['category_id']);
            $model->categories()->save($category);
        }
    }

    public function getServiceCategories()
    {
        return array(
            0 =>
            array(
              'id' => 9416825,
              'title' => 'Молчаливый мастер',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 15,
            ),
            1 =>
            array(
              'id' => 7092629,
              'title' => 'Популярные услуги',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 14,
            ),
            2 =>
            array(
              'id' => 7092228,
              'title' => 'Эксклюзивные услуги',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 13,
            ),
            3 =>
            array(
              'id' => 7092623,
              'title' => 'Маникюр',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 12,
            ),
            4 =>
            array(
              'id' => 7092627,
              'title' => 'Педикюр',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 11,
            ),
            5 =>
            array(
              'id' => 7092628,
              'title' => 'Покрытия',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 10,
            ),
            6 =>
            array(
              'id' => 7092621,
              'title' => 'Дизайн',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 9,
            ),
            7 =>
            array(
              'id' => 7092630,
              'title' => 'Снятие покрытия',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 8,
            ),
            8 =>
            array(
              'id' => 7092624,
              'title' => 'Наращивание',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 7,
            ),
            9 =>
            array(
              'id' => 7092626,
              'title' => 'Одновременные услуги в 4 руки',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 6,
            ),
            10 =>
            array(
              'id' => 7092631,
              'title' => 'Уходы',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 5,
            ),
            11 =>
            array(
              'id' => 7092279,
              'title' => 'Брови и ресницы',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 4,
            ),
            12 =>
            array(
              'id' => 7092622,
              'title' => 'Коррекционный педикюр',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 3,
            ),
            13 =>
            array(
              'id' => 10880980,
              'title' => 'Прическа',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 0,
            ),
            14 =>
            array(
              'id' => 10881058,
              'title' => 'Укладка',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 0,
            ),
            15 =>
            array(
              'id' => 10881089,
              'title' => 'Плетение кос',
              'sex' => 0,
              'api_id' => 0,
              'weight' => 0,
            ),
        );
    }

    public function getServiceCategory($categoryId)
    {
        $categories = $this->getServiceCategories();

        foreach ($categories as $category) {
            if ($category['id'] == $categoryId) {
                return Category::where('title', $category['title'])->firstOrFail();
            }
        }
    }

    public function getServices()
    {
        return array(
          0 =>
          array(
            'id' => 9416830,
            'title' => 'Молчаливый мастер',
            'category_id' => 9416825,
            'price_min' => 0,
            'price_max' => 0,
            'discount' => 0,
            'comment' => 'Вы устали после работы или учебы? Хотите провести время в тишине или посмотреть сериал?
      Мастер с удовольствием выполнит ваше пожелание!',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 0,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 0,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          1 =>
          array(
            'id' => 8093333,
            'title' => 'Стажер Маникюр + покрытие гель-лак',
            'category_id' => 7092629,
            'price_min' => 890,
            'price_max' => 890,
            'discount' => 0,
            'comment' => '',
            'weight' => 15,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 890,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 890,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          2 =>
          array(
            'id' => 8093335,
            'title' => 'Стажер Маникюр + покрытие гель-лак + снятие гель-лака',
            'category_id' => 7092629,
            'price_min' => 1090,
            'price_max' => 1090,
            'discount' => 0,
            'comment' => '',
            'weight' => 14,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1090,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1090,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          3 =>
          array(
            'id' => 7093196,
            'title' => 'Маникюр+покрытие гель-лак',
            'category_id' => 7092629,
            'price_min' => 1600,
            'price_max' => 1600,
            'discount' => 0,
            'comment' => '',
            'weight' => 13,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          4 =>
          array(
            'id' => 7232854,
            'title' => 'ТОП Маникюр+покрытие гель-лак',
            'category_id' => 7092629,
            'price_min' => 1800,
            'price_max' => 1800,
            'discount' => 0,
            'comment' => '',
            'weight' => 12,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          5 =>
          array(
            'id' => 7093197,
            'title' => 'Маникюр+покрытие гель-лак+снятие гель-лака',
            'category_id' => 7092629,
            'price_min' => 1800,
            'price_max' => 1800,
            'discount' => 0,
            'comment' => '',
            'weight' => 11,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          6 =>
          array(
            'id' => 7232855,
            'title' => 'ТОП Маникюр+покрытие гель-лак+снятие гель-лака',
            'category_id' => 7092629,
            'price_min' => 2000,
            'price_max' => 2000,
            'discount' => 0,
            'comment' => '',
            'weight' => 10,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          7 =>
          array(
            'id' => 7093202,
            'title' => 'Педикюр+покрытие гель-лак',
            'category_id' => 7092629,
            'price_min' => 2300,
            'price_max' => 2300,
            'discount' => 0,
            'comment' => '',
            'weight' => 9,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2300,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2300,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          8 =>
          array(
            'id' => 7232857,
            'title' => 'ТОП Педикюр+покрытие гель-лак',
            'category_id' => 7092629,
            'price_min' => 2700,
            'price_max' => 2700,
            'discount' => 0,
            'comment' => '',
            'weight' => 8,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          9 =>
          array(
            'id' => 7093201,
            'title' => 'Педикюр+покрытие гель-лак+снятие гель-лака',
            'category_id' => 7092629,
            'price_min' => 2500,
            'price_max' => 2500,
            'discount' => 0,
            'comment' => '',
            'weight' => 7,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          10 =>
          array(
            'id' => 7232858,
            'title' => 'ТОП Педикюр+покрытие гель-лак+снятие гель-лака',
            'category_id' => 7092629,
            'price_min' => 2900,
            'price_max' => 2900,
            'discount' => 0,
            'comment' => '',
            'weight' => 6,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2900,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2900,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          11 =>
          array(
            'id' => 7232852,
            'title' => 'ТОП Коррекция нарощенных ногтей (включая снятие гель-лака, маникюр, покрытие гель-лак в один тон)',
            'category_id' => 7092629,
            'price_min' => 3600,
            'price_max' => 3600,
            'discount' => 0,
            'comment' => '',
            'weight' => 5,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          12 =>
          array(
            'id' => 7232856,
            'title' => 'ТОП Наращивание ногтей под лак и гель-лак (включая маникюр и покрытие гель-лак) *гель/акригель',
            'category_id' => 7092629,
            'price_min' => 4200,
            'price_max' => 4200,
            'discount' => 0,
            'comment' => '',
            'weight' => 4,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 4200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 4200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          13 =>
          array(
            'id' => 7134228,
            'title' => 'Ночной прайс +20%',
            'category_id' => 7092629,
            'price_min' => 50,
            'price_max' => 1000,
            'discount' => 0,
            'comment' => '',
            'weight' => 3,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 50,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 50,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          14 =>
          array(
            'id' => 7093200,
            'title' => 'Моделирование+окрашивание бровей (хна/краска)',
            'category_id' => 7092629,
            'price_min' => 1200,
            'price_max' => 1200,
            'discount' => 0,
            'comment' => '',
            'weight' => 1,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          15 =>
          array(
            'id' => 10743511,
            'title' => 'Счастливые часы Маникюр + покрытие гель-лак',
            'category_id' => 7092228,
            'price_min' => 1500,
            'price_max' => 1500,
            'discount' => 0,
            'comment' => 'Предложение действует во всех студиях сети Кисточки с 1.09.2022 по 30.11.2022 года с 12:00 до 16:00 и не суммируется с другими скидками и акциями. В стоимость услуги по указанной цене входит маникюр с однотонным покрытием гель-лак. Снятие гель лака и дизайн ногтей оплачивается дополнительно.
      При записи онлайн необходимо выбрать услугу "Счастливые часы Маникюр + покрытие гель-лак". Не все мастера студий участвуют в акции. 
      Сроки акции могут быть изменены после размещения соответствующей информации на сайте. Организатор акции: ООО "КИСТОЧКИ Финанс", ИНН 7842143740',
            'weight' => 15,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          16 =>
          array(
            'id' => 8839483,
            'title' => 'Королевский уход (маникюр и педикюр в 4 руки с покрытием гель-лак)',
            'category_id' => 7092228,
            'price_min' => 4200,
            'price_max' => 4200,
            'discount' => 0,
            'comment' => 'Акция проходит в студиях KISTOCHKI с 01.07.2022г. по 15.12.2022г, действует с 09.00 до 21.00 ежедневно. Акция с другими скидками и акциями не суммируется. В стоимость услуги по указанной цене входит маникюр + педикюр + однотонное покрытие гель-лаком. Услуги оказываются одновременно, в четыре руки. Снятие гель лака и дизайн ногтей оплачивается дополнительно. Организатор акции: ООО "КИСТОЧКИ Финанс", ИНН 7842143740',
            'weight' => 14,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 4200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 4200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          17 =>
          array(
            'id' => 9012916,
            'title' => 'Педикюр Лайт',
            'category_id' => 7092228,
            'price_min' => 1900,
            'price_max' => 1900,
            'discount' => 0,
            'comment' => '',
            'weight' => 13,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1900,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1900,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          18 =>
          array(
            'id' => 10743512,
            'title' => 'Счастливые часы Педикюр + покрытие гель-лак',
            'category_id' => 7092228,
            'price_min' => 2100,
            'price_max' => 2100,
            'discount' => 0,
            'comment' => 'Предложение действует во всех студиях сети Кисточки с 1.09.2022 по 30.11.2022 года с 12:00 до 16:00 и не суммируется с другими скидками и акциями. В стоимость услуги по указанной цене входит педикюр с однотонным покрытием гель-лак. Снятие гель лака и дизайн ногтей оплачивается дополнительно.
      При записи онлайн необходимо выбрать услугу "Счастливые часы Педикюр + покрытие гель-лак". Не все мастера студий участвуют в акции. 
      Сроки акции могут быть изменены после размещения соответствующей информации на сайте. Организатор акции: ООО "КИСТОЧКИ Финанс", ИНН 7842143740',
            'weight' => 12,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          19 =>
          array(
            'id' => 10852895,
            'title' => 'Зимний педикюр',
            'category_id' => 7092228,
            'price_min' => 1500,
            'price_max' => 1500,
            'discount' => 0,
            'comment' => 'Предложение действует во всех студиях сети Кисточки с 19.09.2022 по 28.02.2023  с 09:00 до 21:00 и не суммируется с другими скидками и акциями. В стоимость услуги по указанной цене входит обработка стоп + придание формы ногтевой пластине + уход (скраб и увлажнение). Снятие гель лака, покрытие гель-лаком и дизайн ногтей оплачивается дополнительно.
      Сроки акции могут быть изменены после размещения соответствующей информации на сайте. Организатор акции: ООО "КИСТОЧКИ Финанс", ИНН 7842143740',
            'weight' => 11,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          20 =>
          array(
            'id' => 10916230,
            'title' => 'Зимний маникюр',
            'category_id' => 7092228,
            'price_min' => 1200,
            'price_max' => 1200,
            'discount' => 0,
            'comment' => 'Предложение действует во всех студиях сети Кисточки с 01.10.2022 по 28.02.2023  с 09:00 до 21:00 и не суммируется с другими скидками и акциями. В стоимость услуги по указанной цене входит Маникюр (аппаратный/комбинированный/классический) + уход (тоник очищающий + скраб + крем). Снятие гель лака, покрытие гель-лаком и дизайн ногтей оплачивается дополнительно.
      Сроки акции могут быть изменены после размещения соответствующей информации на сайте. Организатор акции: ООО "КИСТОЧКИ Финанс", ИНН 7842143740',
            'weight' => 10,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          21 =>
          array(
            'id' => 7390980,
            'title' => 'Ламинирование бровей (коррекция в подарок)',
            'category_id' => 7092228,
            'price_min' => 1990,
            'price_max' => 1990,
            'discount' => 0,
            'comment' => 'Акция проходит в студии KISTOCHKI с 01.10.2021г. по 31.01.2021г. и действует с 9.00 до 21.00 ежедневно. Акция с другими скидками и акциями не суммируется. В стоимость услуги по указанной цене входит ламинирование бровей, окрашивание и коррекция бровей. При опоздании на процедуру более, чем на 5 минут, организатор акции вправе отказать в оказании услуги по указанной стоимости.',
            'weight' => 9,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1990,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1990,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          22 =>
          array(
            'id' => 7234850,
            'title' => 'Наращивание "под ключ"',
            'category_id' => 7092228,
            'price_min' => 3400,
            'price_max' => 3400,
            'discount' => 0,
            'comment' => 'Акция проходит в студиях KISTOCHKI с 01.09.2022г. по 30.11.2022г, действует с 09.00 до 21.00 ежедневно. Акция с другими скидками и акциями не суммируется. В стоимость услуги по указанной цене входит маникюр, наращивание и однотонное покрытие гель-лаком. Дизайн ногтей оплачивается отдельно. При опоздании на процедуру более, чем на 5 минут, организатор акции вправе отказать в оказании услуги по указанной стоимости.',
            'weight' => 8,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3400,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3400,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          23 =>
          array(
            'id' => 7234846,
            'title' => 'Комбо "Маникюр+брови"',
            'category_id' => 7092228,
            'price_min' => 2800,
            'price_max' => 2800,
            'discount' => 0,
            'comment' => 'Акция проходит в студиях KISTOCHKI с 01.10.2022г. по 30.11.2022г, действует с 09.00 до 21.00 ежедневно. Акция с другими скидками и акциями не суммируется. В стоимость услуги по указанной цене входит маникюр + однотонное покрытие гель-лаком и моделирование и окрашивание бровей краской. Акция не распространяется на покрытие "кошачий глаз", камуфляжные базы и Luxio. Дизайн ногтей оплачивается отдельно. При опоздании на процедуру более, чем на 5 минут, организатор акции вправе отказать в оказании услуги по указанной стоимости.',
            'weight' => 7,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          24 =>
          array(
            'id' => 7093256,
            'title' => 'Маникюр (классический, комбинированный, аппаратный, европейский)',
            'category_id' => 7092623,
            'price_min' => 700,
            'price_max' => 700,
            'discount' => 0,
            'comment' => '',
            'weight' => 15,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          25 =>
          array(
            'id' => 7232961,
            'title' => 'ТОП Маникюр (Комбинированный,апаратный,классический)',
            'category_id' => 7092623,
            'price_min' => 800,
            'price_max' => 800,
            'discount' => 0,
            'comment' => '',
            'weight' => 14,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          26 =>
          array(
            'id' => 7093257,
            'title' => 'Маникюр *при покрытии',
            'category_id' => 7092623,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 13,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          27 =>
          array(
            'id' => 7232962,
            'title' => 'ТОП Маникюр *при покрытии',
            'category_id' => 7092623,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 12,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          28 =>
          array(
            'id' => 7093258,
            'title' => 'Мужской маникюр *без покрытия',
            'category_id' => 7092623,
            'price_min' => 800,
            'price_max' => 800,
            'discount' => 0,
            'comment' => '',
            'weight' => 11,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          29 =>
          array(
            'id' => 7232963,
            'title' => 'ТОП Мужской маникюр *без покрытия',
            'category_id' => 7092623,
            'price_min' => 1000,
            'price_max' => 1000,
            'discount' => 0,
            'comment' => '',
            'weight' => 10,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          30 =>
          array(
            'id' => 7093259,
            'title' => 'Мужской маникюр *при покрытии',
            'category_id' => 7092623,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 9,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          31 =>
          array(
            'id' => 7232964,
            'title' => 'ТОП Мужской маникюр *при покрытии',
            'category_id' => 7092623,
            'price_min' => 700,
            'price_max' => 700,
            'discount' => 0,
            'comment' => '',
            'weight' => 8,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          32 =>
          array(
            'id' => 7093253,
            'title' => 'Детский маникюр без покрытия',
            'category_id' => 7092623,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 7,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          33 =>
          array(
            'id' => 7232960,
            'title' => 'ТОП Детский маникюр без покрытия',
            'category_id' => 7092623,
            'price_min' => 700,
            'price_max' => 700,
            'discount' => 0,
            'comment' => '',
            'weight' => 6,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          34 =>
          array(
            'id' => 7093255,
            'title' => 'Детский маникюр+лак',
            'category_id' => 7092623,
            'price_min' => 800,
            'price_max' => 800,
            'discount' => 0,
            'comment' => '',
            'weight' => 5,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          35 =>
          array(
            'id' => 7232959,
            'title' => 'ТОП Детский  маникюр+лак',
            'category_id' => 7092623,
            'price_min' => 1000,
            'price_max' => 1000,
            'discount' => 0,
            'comment' => '',
            'weight' => 4,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          36 =>
          array(
            'id' => 7093260,
            'title' => 'Полировка ногтей',
            'category_id' => 7092623,
            'price_min' => 200,
            'price_max' => 200,
            'discount' => 0,
            'comment' => '',
            'weight' => 3,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          37 =>
          array(
            'id' => 7093262,
            'title' => 'Придание/изменение формы ногтевой пластине (без маникюра)',
            'category_id' => 7092623,
            'price_min' => 200,
            'price_max' => 200,
            'discount' => 0,
            'comment' => '',
            'weight' => 2,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          38 =>
          array(
            'id' => 7093233,
            'title' => 'Экспресс-педикюр (обработка пальцев/стопы)',
            'category_id' => 7092627,
            'price_min' => 900,
            'price_max' => 900,
            'discount' => 0,
            'comment' => '',
            'weight' => 12,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 900,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 900,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          39 =>
          array(
            'id' => 7232914,
            'title' => 'ТОП Экспресс-педикюр (обработка пальцев или стопы)',
            'category_id' => 7092627,
            'price_min' => 1100,
            'price_max' => 1100,
            'discount' => 0,
            'comment' => '',
            'weight' => 11,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          40 =>
          array(
            'id' => 7093224,
            'title' => 'Педикюр *без покрытия (дисковый, аппаратный, комбинированный, классический)',
            'category_id' => 7092627,
            'price_min' => 1600,
            'price_max' => 1600,
            'discount' => 0,
            'comment' => '',
            'weight' => 10,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          41 =>
          array(
            'id' => 7232909,
            'title' => 'ТОП Педикюр *без покрытия (дисковый,аппаратный,комбинированный,классический)',
            'category_id' => 7092627,
            'price_min' => 1700,
            'price_max' => 1700,
            'discount' => 0,
            'comment' => '',
            'weight' => 9,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          42 =>
          array(
            'id' => 7093225,
            'title' => 'Педикюр *при покрытии (дисковый, аппаратный, комбинированный, классический)',
            'category_id' => 7092627,
            'price_min' => 1300,
            'price_max' => 1300,
            'discount' => 0,
            'comment' => '',
            'weight' => 8,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1300,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1300,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          43 =>
          array(
            'id' => 7232910,
            'title' => 'ТОП Педикюр *при покрытии (дисковый, аппаратный, комбинированный, классический)',
            'category_id' => 7092627,
            'price_min' => 1500,
            'price_max' => 1500,
            'discount' => 0,
            'comment' => '',
            'weight' => 7,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          44 =>
          array(
            'id' => 7093227,
            'title' => 'Педикюр SPA женский',
            'category_id' => 7092627,
            'price_min' => 2100,
            'price_max' => 2100,
            'discount' => 0,
            'comment' => '',
            'weight' => 6,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          45 =>
          array(
            'id' => 7232911,
            'title' => 'ТОП Педикюр SPA женский',
            'category_id' => 7092627,
            'price_min' => 2300,
            'price_max' => 2300,
            'discount' => 0,
            'comment' => '',
            'weight' => 5,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2300,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2300,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          46 =>
          array(
            'id' => 7093231,
            'title' => 'Педикюр мужской (комбинированный/аппаратный)',
            'category_id' => 7092627,
            'price_min' => 1900,
            'price_max' => 1900,
            'discount' => 0,
            'comment' => '',
            'weight' => 4,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1900,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1900,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          47 =>
          array(
            'id' => 7232913,
            'title' => 'ТОП Педикюр мужской (комбинированный/аппаратный)',
            'category_id' => 7092627,
            'price_min' => 2200,
            'price_max' => 2200,
            'discount' => 0,
            'comment' => '',
            'weight' => 3,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          48 =>
          array(
            'id' => 7093230,
            'title' => 'Педикюр SPA мужской',
            'category_id' => 7092627,
            'price_min' => 2400,
            'price_max' => 2400,
            'discount' => 0,
            'comment' => '',
            'weight' => 2,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2400,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2400,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          49 =>
          array(
            'id' => 7232912,
            'title' => 'ТОП Педикюр SPA мужской',
            'category_id' => 7092627,
            'price_min' => 2700,
            'price_max' => 2700,
            'discount' => 0,
            'comment' => '',
            'weight' => 1,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          50 =>
          array(
            'id' => 7093214,
            'title' => 'Покрытие гель-лаком (включая выравнивание)',
            'category_id' => 7092628,
            'price_min' => 1000,
            'price_max' => 1000,
            'discount' => 0,
            'comment' => '',
            'weight' => 12,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          51 =>
          array(
            'id' => 7232889,
            'title' => 'ТОП Покрытие гель-лаком (включая выравнивание)',
            'category_id' => 7092628,
            'price_min' => 1200,
            'price_max' => 1200,
            'discount' => 0,
            'comment' => '',
            'weight' => 11,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          52 =>
          array(
            'id' => 7093213,
            'title' => 'Покрытие база и/или топ гель-лак (прозрачное покрытие)',
            'category_id' => 7092628,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 8,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          53 =>
          array(
            'id' => 7232886,
            'title' => 'ТОП Покрытие база и/или топ гель-лак (прозрачное покрытие)',
            'category_id' => 7092628,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 7,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          54 =>
          array(
            'id' => 7093216,
            'title' => 'Покрытие цветным лаком, базой, закрепителем',
            'category_id' => 7092628,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 6,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          55 =>
          array(
            'id' => 7232890,
            'title' => 'ТОП Покрытие цветным лаком, базой закрепителем',
            'category_id' => 7092628,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 5,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          56 =>
          array(
            'id' => 7093215,
            'title' => 'Покрытие Кошачий глаз, декоративным топом (матовый, шимер и проч)',
            'category_id' => 7092628,
            'price_min' => 200,
            'price_max' => 200,
            'discount' => 0,
            'comment' => '',
            'weight' => 4,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          57 =>
          array(
            'id' => 7093209,
            'title' => 'Ламинирование ногтей',
            'category_id' => 7092628,
            'price_min' => 900,
            'price_max' => 900,
            'discount' => 0,
            'comment' => '',
            'weight' => 3,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 900,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 900,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          58 =>
          array(
            'id' => 7093210,
            'title' => 'Лечебное покрытие IBX',
            'category_id' => 7092628,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 2,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          59 =>
          array(
            'id' => 7093283,
            'title' => 'Френч/обратный френч/лунки 1 палец',
            'category_id' => 7092621,
            'price_min' => 50,
            'price_max' => 50,
            'discount' => 0,
            'comment' => '',
            'weight' => 27,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 50,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 50,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          60 =>
          array(
            'id' => 7093280,
            'title' => 'Дизайн простой 1 палец',
            'category_id' => 7092621,
            'price_min' => 100,
            'price_max' => 100,
            'discount' => 0,
            'comment' => '',
            'weight' => 26,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          61 =>
          array(
            'id' => 7093282,
            'title' => 'Дизайн средний 1 палец',
            'category_id' => 7092621,
            'price_min' => 250,
            'price_max' => 250,
            'discount' => 0,
            'comment' => '',
            'weight' => 25,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 250,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 250,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          62 =>
          array(
            'id' => 7093281,
            'title' => 'Дизайн сложный 1 палец',
            'category_id' => 7092621,
            'price_min' => 400,
            'price_max' => 400,
            'discount' => 0,
            'comment' => '',
            'weight' => 24,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 400,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 400,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          63 =>
          array(
            'id' => 7093185,
            'title' => 'Снятие гель-лака и укрепления *при маникюре',
            'category_id' => 7092630,
            'price_min' => 200,
            'price_max' => 200,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          64 =>
          array(
            'id' => 7093187,
            'title' => 'Снятие гель-лака и укрепления+полировка *без маникюра',
            'category_id' => 7092630,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          65 =>
          array(
            'id' => 7093188,
            'title' => 'Снятие лака',
            'category_id' => 7092630,
            'price_min' => 50,
            'price_max' => 50,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 50,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 50,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          66 =>
          array(
            'id' => 7093189,
            'title' => 'Снятие нарощенных ногтей, геля, акрила *без маникюра',
            'category_id' => 7092630,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          67 =>
          array(
            'id' => 7093190,
            'title' => 'Снятие нарощенных ногтей, геля, акрила *при маникюре',
            'category_id' => 7092630,
            'price_min' => 300,
            'price_max' => 300,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 300,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 300,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          68 =>
          array(
            'id' => 7093246,
            'title' => 'Наращивание ногтей под лак и гель-лак (включая маникюр) *гель/акригель',
            'category_id' => 7092624,
            'price_min' => 2600,
            'price_max' => 2600,
            'discount' => 0,
            'comment' => '',
            'weight' => 10,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          69 =>
          array(
            'id' => 7232945,
            'title' => 'ТОП Наращивание ногтей под лак и гель лак (включая маникюр) *гель/акригель',
            'category_id' => 7092624,
            'price_min' => 3000,
            'price_max' => 3000,
            'discount' => 0,
            'comment' => '',
            'weight' => 9,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          70 =>
          array(
            'id' => 7093244,
            'title' => 'Наращивание ногтей "выкладной French" (под ключ)',
            'category_id' => 7092624,
            'price_min' => 5100,
            'price_max' => 5100,
            'discount' => 0,
            'comment' => '',
            'weight' => 8,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 5100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 5100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          71 =>
          array(
            'id' => 7232944,
            'title' => 'ТОП Наращивание ногтей "выкладной French" (под ключ)',
            'category_id' => 7092624,
            'price_min' => 5900,
            'price_max' => 5900,
            'discount' => 0,
            'comment' => '',
            'weight' => 7,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 5900,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 5900,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          72 =>
          array(
            'id' => 7093243,
            'title' => 'Коррекция нарощенных ногтей (включая маникюр)',
            'category_id' => 7092624,
            'price_min' => 2100,
            'price_max' => 2100,
            'discount' => 0,
            'comment' => '',
            'weight' => 6,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          73 =>
          array(
            'id' => 7232943,
            'title' => 'ТОП Коррекция нарощенных ногтей (включая маникюр)',
            'category_id' => 7092624,
            'price_min' => 2400,
            'price_max' => 2400,
            'discount' => 0,
            'comment' => '',
            'weight' => 5,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2400,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2400,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          74 =>
          array(
            'id' => 7110673,
            'title' => 'Укрепление гелем/пудрой/акригелем',
            'category_id' => 7092624,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 4,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          75 =>
          array(
            'id' => 7093248,
            'title' => 'Ремонт 1 ногтя трещина, уголки',
            'category_id' => 7092624,
            'price_min' => 200,
            'price_max' => 200,
            'discount' => 0,
            'comment' => '',
            'weight' => 3,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          76 =>
          array(
            'id' => 7093247,
            'title' => 'Ремонт 1 ногтя нарастить длину',
            'category_id' => 7092624,
            'price_min' => 250,
            'price_max' => 250,
            'discount' => 0,
            'comment' => '',
            'weight' => 2,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 250,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 250,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          77 =>
          array(
            'id' => 7232946,
            'title' => 'ТОП Ремонт 1 ногтя нарастить длину (включая снятие и покрытие)',
            'category_id' => 7092624,
            'price_min' => 290,
            'price_max' => 290,
            'discount' => 0,
            'comment' => '',
            'weight' => 1,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 290,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 290,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          78 =>
          array(
            'id' => 7093238,
            'title' => 'Мужской "Королевский уход" (педикюр+маникюр в четыре руки, без покрытия)',
            'category_id' => 7092626,
            'price_min' => 3200,
            'price_max' => 3200,
            'discount' => 0,
            'comment' => '',
            'weight' => 4,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          79 =>
          array(
            'id' => 10402833,
            'title' => 'ТОП Мужской "Королевский уход" (маникюр и педикюр в 4 руки, без покрытия)',
            'category_id' => 7092626,
            'price_min' => 3700,
            'price_max' => 3700,
            'discount' => 0,
            'comment' => '',
            'weight' => 3,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          80 =>
          array(
            'id' => 7093237,
            'title' => '"Королевский уход" (педикюр+маникюр в четыре руки, без покрытия)',
            'category_id' => 7092626,
            'price_min' => 2800,
            'price_max' => 2800,
            'discount' => 0,
            'comment' => '',
            'weight' => 2,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          81 =>
          array(
            'id' => 10402832,
            'title' => 'ТОП "Королевский уход" (маникюр и педикюр в 4 руки, без покрытия)',
            'category_id' => 7092626,
            'price_min' => 3100,
            'price_max' => 3100,
            'discount' => 0,
            'comment' => '',
            'weight' => 1,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3100,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3100,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          82 =>
          array(
            'id' => 7093172,
            'title' => 'SPA-уход за руками или ногами (скраб, маска, лосьон)',
            'category_id' => 7092631,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          83 =>
          array(
            'id' => 7093174,
            'title' => 'Массаж рук или ног',
            'category_id' => 7092631,
            'price_min' => 300,
            'price_max' => 300,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 300,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 300,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          84 =>
          array(
            'id' => 7093175,
            'title' => 'Парафинотерапия (скраб, парафин, лосьон)',
            'category_id' => 7092631,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          85 =>
          array(
            'id' => 7092290,
            'title' => 'Долговременная укладка бровей',
            'category_id' => 7092279,
            'price_min' => 1500,
            'price_max' => 1500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          86 =>
          array(
            'id' => 7092292,
            'title' => 'Коррекция бровей для мужчин',
            'category_id' => 7092279,
            'price_min' => 700,
            'price_max' => 700,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          87 =>
          array(
            'id' => 7092295,
            'title' => 'Моделирование бровей *без окрашивания',
            'category_id' => 7092279,
            'price_min' => 600,
            'price_max' => 600,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 600,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 600,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          88 =>
          array(
            'id' => 7092299,
            'title' => 'Моделирование бровей *при окрашивании',
            'category_id' => 7092279,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          89 =>
          array(
            'id' => 7092305,
            'title' => 'Окрашивание бровей (хна/краска)',
            'category_id' => 7092279,
            'price_min' => 700,
            'price_max' => 700,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 700,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 700,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          90 =>
          array(
            'id' => 8915276,
            'title' => 'Счастье для бровей',
            'category_id' => 7092279,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          91 =>
          array(
            'id' => 9889799,
            'title' => 'Консультация подолога',
            'category_id' => 7092622,
            'price_min' => 0,
            'price_max' => 0,
            'discount' => 0,
            'comment' => '',
            'weight' => 14,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 0,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 0,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          92 =>
          array(
            'id' => 8916726,
            'title' => 'Тампонада',
            'category_id' => 7092622,
            'price_min' => 200,
            'price_max' => 200,
            'discount' => 0,
            'comment' => '',
            'weight' => 11,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          93 =>
          array(
            'id' => 8916725,
            'title' => 'Зачистка онихолизисных карманов',
            'category_id' => 7092622,
            'price_min' => 300,
            'price_max' => 300,
            'discount' => 0,
            'comment' => '',
            'weight' => 10,
            'active' => 0,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 300,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 300,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          94 =>
          array(
            'id' => 10881018,
            'title' => 'Прическа на короткие волосы',
            'category_id' => 10880980,
            'price_min' => 1800,
            'price_max' => 1800,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          95 =>
          array(
            'id' => 10881046,
            'title' => 'Прическа на средние волосы',
            'category_id' => 10880980,
            'price_min' => 2500,
            'price_max' => 2500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          96 =>
          array(
            'id' => 10881050,
            'title' => 'Прическа на длинные волосы',
            'category_id' => 10880980,
            'price_min' => 3000,
            'price_max' => 3000,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 3000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 3000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          97 =>
          array(
            'id' => 10881064,
            'title' => 'Выпрямление утюжком (короткие волосы)',
            'category_id' => 10881058,
            'price_min' => 400,
            'price_max' => 400,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 400,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 400,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          98 =>
          array(
            'id' => 10881078,
            'title' => 'Выпрямление утюжком (средние волосы)',
            'category_id' => 10881058,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          99 =>
          array(
            'id' => 10881081,
            'title' => 'Выпрямление утюжком (длинные волосы)',
            'category_id' => 10881058,
            'price_min' => 0,
            'price_max' => 0,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 0,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 0,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          100 =>
          array(
            'id' => 10881085,
            'title' => 'Локоны (короткие волосы)',
            'category_id' => 10881058,
            'price_min' => 1200,
            'price_max' => 1200,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          101 =>
          array(
            'id' => 10881086,
            'title' => 'Локоны (средние волосы)',
            'category_id' => 10881058,
            'price_min' => 1800,
            'price_max' => 1800,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          102 =>
          array(
            'id' => 10881087,
            'title' => 'Локоны (длинные волосы)',
            'category_id' => 10881058,
            'price_min' => 2200,
            'price_max' => 2200,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 2200,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 2200,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          103 =>
          array(
            'id' => 10881096,
            'title' => 'Плетение кос на короткие волосы',
            'category_id' => 10881089,
            'price_min' => 500,
            'price_max' => 500,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 500,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 500,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          104 =>
          array(
            'id' => 10881098,
            'title' => 'Плетение кос на средние волосы',
            'category_id' => 10881089,
            'price_min' => 800,
            'price_max' => 800,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 800,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 800,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
          105 =>
          array(
            'id' => 10881102,
            'title' => 'Плетение кос на длинные волосы',
            'category_id' => 10881089,
            'price_min' => 1000,
            'price_max' => 1000,
            'discount' => 0,
            'comment' => '',
            'weight' => 0,
            'active' => 1,
            'sex' => 0,
            'image' => '',
            'prepaid' => 'forbidden',
            'seance_length' => null,
            'abonement_restriction' => 0,
            'prepaid_settings' =>
            array(
              'status' => 'forbidden',
              'prepaid_full' =>
              array(
                'amount' => 1000,
                'currency' => 'RUB',
              ),
              'prepaid_min' =>
              array(
                'amount' => 1000,
                'percent' => 100,
                'currency' => 'RUB',
              ),
            ),
          ),
        );
    }
}
