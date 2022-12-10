<?php
$title = $_POST['title'];
//буквы и цифры
$pattern = '/^[а-яА-ЯёЁa-zA-Z0-9]+$/';
//буквы
$pattern = '/^[а-яА-ЯёЁa-zA-Z]+$/';
//цифры
$pattern = '/(([a-z]+\d+)|(\d+[a-z]+)) [a-z\d] */';