<?php
spl_autoload_register(function ($clase) {
    require_once __DIR__ . '/' . $clase . '.php';
});
