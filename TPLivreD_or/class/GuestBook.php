<?php
//is_dir : indique si le fichier est un dossier
require_once 'Message.php';
class GuestBook {

	private $file;

	public function __construct(string $file){
		$directory = dirname($file);
		if (!is_dir($directory)) {
			mkdir($directory, 0777, true);
		}
		if(!file_exists($file)){
			touch($file); 		// Permet de créer un fichier
		}
		$this->file = $file;
	}

	public function addMessage(Message $message): void{
		file_put_contents($this->file, $message->toJSON() . PHP_EOL, FILE_APPEND);
	}

	public function getMessages(): array {
		$content = trim(file_get_contents($this->file)); //trim : pour supprimer les lignes en plus ect
		$lines = explode(PHP_EOL, $content);	//explode : récupérer chaque ligne individuellement
		foreach ($lines as $line) {
			$messages[] = Message::fromJSON($line);
		}
		return array_reverse($messages); 	// Inverse les messages du plus récent au plus vieux //
	}
}