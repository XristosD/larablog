<?php

namespace App\Enum;

enum UserRole:int {
  case ADMIN = 1;
  case EDITOR = 2;
  case AUTHENTICATED = 3;
}