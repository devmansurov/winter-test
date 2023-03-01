<?php

namespace Pp\Kistochki\Database\Seeds;

use Str;
use Seeder;
use Pp\Kistochki\Models\Tag;
use Pp\Kistochki\Enums\TagType;

class SeedTagsTable extends Seeder
{
    public function run()
    {
        $tags = [];

        $reviewTags = $this->getReviewTags();
        foreach ($reviewTags as $tag) {
            $tags[] = [
              'title' => $tag,
              'slug' => Str::slug($tag),
              'type' => TagType::REVIEW
            ];
        }



        Tag::insert($tags);
    }

    public function getReviewTags()
    {
        return [
          "Маникюр",
          "Педикюр",
          "Покрытие",
          "Дизайн",
          "Брови",
          "Ресницы"
        ];
    }
}
