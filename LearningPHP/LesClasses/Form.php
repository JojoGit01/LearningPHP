<?php
//Chapitre 25, Statique //
//Si on a static au début d'une fonction celle ci n'as plus besoin d'étre instancier quand on l'appelle
class Form {

	public static $class = "Jojo le bosse";

	public static function checkbox(string $name, string $value = null, array $data = []): string {
		$attributes = '';
		if(isset($data[$name]) && in_array($value, $data[$name])) {
			$attributes .= 'checked';
		}
		$attributes = ' class="' . self::$class . '"'; //Meilleure que l'autre // Référence a la classe
		//$class = self::$class; 	//Référence a la classe // IMPORTANT // 
		return <<<HTML
		<input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
	}

}