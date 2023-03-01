<?php

namespace Pp\Kistochki\Database\Seeds;

use Str;
use Seeder;
use Pp\Kistochki\Models\Review;
use Pp\Kistochki\Models\Tag;
use Pp\Kistochki\Enums\TagType;

class SeedReviewsTable extends Seeder
{
    public function run()
    {
        $reviews = $this->getReviews();
        // $reviewsData = [];
        $tags = Tag::where('type', TagType::REVIEW)->get()->pluck('id')->toArray();

        foreach ($reviews as $review) {
            if ($review['text']) {
                $review = Review::create([
                    'review' => $review['text'],
                    'user' => $review['user_name'],
                    'rating' => $review['rating'],
                    'created_at' => $review['date'],
                    'updated_at' => $review['date']
                ]);
                $model = Tag::findOrFail($tags[array_rand($tags)]);
                $review->tags()->save($model);
            }
        }

        // Review::insert($reviewsData);
    }

    public function getReviews()
    {
        return array(
          0 =>
          array(
            'id' => 12653293,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Очень приятная девушка, мастер своего дела. Работает очень аккуратно и качественно. Огромное СПАСИБО!',
            'date' => '2022-11-05 17:44:46',
            'rating' => 5,
            'user_id' => 13532257,
            'user_name' => 'Ольга',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 531526728,
          ),
          1 =>
          array(
            'id' => 12581248,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => '',
            'date' => '2022-10-30 12:27:47',
            'rating' => 5,
            'user_id' => 9909850,
            'user_name' => 'Татьяна Александровна Семёнова',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 530663612,
          ),
          2 =>
          array(
            'id' => 12468764,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => '',
            'date' => '2022-10-20 13:13:59',
            'rating' => 5,
            'user_id' => 152883380,
            'user_name' => 'Екатерина',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 516213292,
          ),
          3 =>
          array(
            'id' => 12420001,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => '',
            'date' => '2022-10-15 20:13:13',
            'rating' => 5,
            'user_id' => 8146494,
            'user_name' => 'Валерия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 519390419,
          ),
          4 =>
          array(
            'id' => 12419979,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Фея ногтевого сервиса ❤️ Качество на высоте',
            'date' => '2022-10-15 20:12:17',
            'rating' => 5,
            'user_id' => 8146494,
            'user_name' => 'Валерия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 0,
          ),
          5 =>
          array(
            'id' => 12279291,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Маникюр как всегда 100 из 100!',
            'date' => '2022-10-01 20:37:08',
            'rating' => 5,
            'user_id' => 8146494,
            'user_name' => 'Валерия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 515549491,
          ),
          6 =>
          array(
            'id' => 12279037,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Прекрасный чуткий мастер, бережный подход, спасибо',
            'date' => '2022-10-01 20:20:13',
            'rating' => 5,
            'user_id' => 158143365,
            'user_name' => 'Юлия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 518147549,
          ),
          7 =>
          array(
            'id' => 12194687,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Всё отлично! Очень аккуратно и качественно. Мастер своего дела. 
        Приятно было пообщаться. Спасибо большое)',
            'date' => '2022-09-23 14:27:13',
            'rating' => 5,
            'user_id' => 13532257,
            'user_name' => 'Ольга',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 515697951,
          ),
          8 =>
          array(
            'id' => 12092642,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Все супер! Быстро, качественно и весело! Рекомендую',
            'date' => '2022-09-13 18:47:08',
            'rating' => 5,
            'user_id' => 1394216,
            'user_name' => 'Екатерина',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 510760476,
          ),
          9 =>
          array(
            'id' => 11947241,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Быстро, качественно-это основные критерии моего визита. Спасибо большое за такой прекрасный маникюр',
            'date' => '2022-08-31 00:50:22',
            'rating' => 5,
            'user_id' => 6472719,
            'user_name' => 'Александра',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 506302830,
          ),
          10 =>
          array(
            'id' => 11922462,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Быстро и качественно! Спасибо',
            'date' => '2022-08-29 12:16:11',
            'rating' => 5,
            'user_id' => 1394216,
            'user_name' => 'Екатерина',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 504389717,
          ),
          11 =>
          array(
            'id' => 11839898,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => '',
            'date' => '2022-08-22 15:38:58',
            'rating' => 5,
            'user_id' => 148478141,
            'user_name' => 'Татьяна',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 500096692,
          ),
          12 =>
          array(
            'id' => 11689527,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Второй раз хожу к Оксане . Добрая , приятная девушка , отличный специалист , может поддержать любой диалог',
            'date' => '2022-08-09 17:58:03',
            'rating' => 5,
            'user_id' => 14123668,
            'user_name' => 'Дарья',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 491371937,
          ),
          13 =>
          array(
            'id' => 11646401,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Очень хороший, весёлый мастер, было приятно пообщаться и сам маникюр очень понравился. Спасибо ей большое ☺
        -Анастасия)',
            'date' => '2022-08-05 20:19:42',
            'rating' => 5,
            'user_id' => 107025890,
            'user_name' => 'Анастасия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 495207209,
          ),
          14 =>
          array(
            'id' => 11407580,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Очень милая девушка) Всё понравилось, спасибо!',
            'date' => '2022-07-15 23:42:47',
            'rating' => 5,
            'user_id' => 141205876,
            'user_name' => 'Лидия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 486720990,
          ),
          15 =>
          array(
            'id' => 11342081,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => '',
            'date' => '2022-07-10 14:04:22',
            'rating' => 5,
            'user_id' => 4541515,
            'user_name' => 'Анастасия',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 483495748,
          ),
          16 =>
          array(
            'id' => 10664116,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => 'Доброжелательный мастер.Аккуратный,красивый маникюр.Спасибо!',
            'date' => '2022-05-10 17:11:08',
            'rating' => 5,
            'user_id' => 14478329,
            'user_name' => 'Татьяна',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 0,
          ),
          17 =>
          array(
            'id' => 10518719,
            'salon_id' => 263730,
            'type' => 1,
            'master_id' => 952510,
            'text' => '',
            'date' => '2022-04-26 23:20:29',
            'rating' => 5,
            'user_id' => 13670687,
            'user_name' => 'Larisa',
            'user_avatar' => 'https://api.yclients.com/images/no-master.png',
            'record_id' => 448801636,
          ),
        );
    }
}
