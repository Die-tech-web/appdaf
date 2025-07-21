<?php

namespace App\Entity;

use App\Core\SetterGetter;

abstract class AbstractEntity extends SetterGetter {
   abstract public static function toObject($data): static;
   abstract public function toArray(): array;

   public function toJson(): string {
       return json_encode($this->toArray());
   }
}
