<?php
class Conv //nowa klasa do konwersji Arabic -> Roman 
{
	protected $input; //okreslamy zmienna -> input liczba arabska wporwadzone przez usera
	
	public function __construct($input) //towrzymy obiekt z 1 zmienna input data -> dane tj. liczba arabska wporwadozna przez uzytkownika
	{
	$this->input=$input;
	}
	
	public function output() //metoda która dokona konwersji liczby
	{
		$solution = ''; //to bedzie wynik narazie nie zawiera zadnych znakow, beda kolejno dodawane symbole rzymskie
		$nums = array( //dane uszeregowane są od największej wartości M po będziemy sprwdzać liczbę od lewej do prawej
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
		'I' => 1,
		);
		
		foreach($nums as $glyph => $int) // dla kazdego elemntu z szeregu $nums zapisanego jako (rzymski symbol key ($glyph)=> (value ($int - l. arabska)
		{ //$this->input to będzie zczytana z htmla liczba podana przez uzytkownika
			while($this->input >= $int)//dopoki $this->input jest >= danemu eleemntowi szeregu w postaci value ($int)
			{
				$this->input -= $int; //z liczby zczytanej przez uzytkownika odejmujemy tę wartość ($int)
				$solution .= $glyph; //do zmiennej $solution dodajemy jej odpowenik w postaci symbolu rzymskiego $glyph z szeregu $nums
			}
		}
		echo "Wprowadzona przez Ciebie liczba to: " . $solution; //zwracamy wynik kiedy petla foreach sie skonczy
	}
}
$number = $_POST['arabska']; //zczytujmey dane podane przez uzytkownika z HTMLa
$result = new Conv($number); //towrzymy nowy obiekt na podstwie klasy Conv
$result->output(); //na podstawie tego obiektu (ktor defacto jest l. podana przez uzytkownika) metod output dokona konwersji i zwroci wynik
?>

