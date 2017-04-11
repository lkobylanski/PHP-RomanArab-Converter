<?php
class Conv //nowa kalsa
{
protected $input; //zawiera 1 zmienna

public function __construct($input)
	{
	$this->input=$input;	//towrzymy obiekt zawierajacy 1 zmienna
	}
public function output() //towrzymy metoda ktora wykona konwersje dla dowolnej wartosci zapisanej przez uzytkownika
	{
		$nums = array( //szereg rzymsko => arabski
		'M' => 1000,
		'CM' => 900,
		'D' => 500,
		'CD' => 400,
		'C' => 100,
		'XC' => 90,
		'L' => 50,
		'XL' => 40,
		'X' => 10, 
		'IX' => 9,
		'V' => 5,
		'IV' => 4,
		'I' => 1);

		$result = 0; //wynik ktory wyswietlimy na koncu
		
		foreach($nums as $key => $value) //dla kazdego elemntu z $nums zapisanego jako $key(rzym) => $value(int)
		{
			while(strpos($this->input, $key) === 0)//dopoki element szeregu zapiany jako $key(rzym) zajmuje 1sze miejsce w zmiennej sczytanej z HTMLa(strpos();
			{
				$result += $value; //do $result (domyslnie == 0) dodaje $value(int) odpowiadajace danemu $key z szeregu $nums
				$this->input = substr($this->input, strlen($key)); //za pomoca funkcji substr skracam dane sczytane z HTMLa o  strlen(dlugosc stringu $key) czyli 1 lub 2 bo X == 1 a IV == 2 etc. strlen($string, $iosc znakow)
			}
		}
		echo "Podana przez Ciebie liczba to : " . $result; //drukujemy tekst + wynik ktory zapisal sie w postaci int w petli while
	}
}

$rom = $_POST['rzymska']; //sczytujemy liczbę z HTML(wporwadzoan przez usera)
$konwert = new Conv($rom); //towrzymy nowy obiekt na podst. klasy Conv i wartosc do zmiennej sczytujemy z HTML $rom = ['rzymska'];
$konwert->output();
?>

