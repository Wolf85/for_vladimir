<?php
echo "<p><i> При решении данных задач, я не утруждал себя в универсальности, или более граммотного подхода, за частую первое пришедшее на ум решение </i></p>";

$input_str = '<div><image class="thumbnail" src="myImage.png" /><span class="smallText">Some Text</span></div>';
echo "<br>";
echo "<h2>TASK 1.<h2/> Дана строка ".htmlspecialchars($input_str)."<br>".
    "Получите название класса картинки (значение атрибута class) не используя регулярные выражения.<br>";
echo "<p><i> Решение в лоб, но оно решает поставленную задачу </i></p>";
$substr_start = '<image class="';
$substr_end = '/>';
$index_start = strpos($input_str, $substr_start)+strlen($substr_start);
$index_end = strpos($input_str, $substr_end);
$val = substr($input_str, $index_start, $index_end);
$val = substr($val, 0, strpos($val, '"'));
echo "<br>Result: ". $val;

//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 2.<h2/> 2. Дано предложение.<br> ".
"Напишите скрипт, меняющий слова местами наоборот (т.е. последнее слово становится первым, предпоследнее вторым и так далее).";
$task_str = 'Напишите скрипт, меняющий слова местами наоборот (т.е. последнее слово становится первым, предпоследнее вторым и так далее).';
$arr = mb_split(" ", $task_str);
$arr = array_reverse($arr);
echo "<br>Result: <br>". implode(" ", $arr);
echo "<br>";

//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 3.<h2/> Дана строка \'aaabbccabc\'. Посчитайте и выведите на экран частоту повторения каждого символа.";
$task_str = 'aaabbccabc';
$arr = str_split($task_str);
$res = array_count_values($arr);
echo "<br>Result:";
echo "<br>";
print_r($res);


//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 4.<h2/> Дана строка, содержащая 3 вида скобок - (), {} и []. <br>".
" Напишите скрипт, который проверяет, что скобки не перепутаны между собой,<br>".
"и что у каждой скобки есть пара. То есть ([]){} - верно, ([)]{} - неверно. <br>";
echo "<p><i> Решение в лоб, вроде работает </i></p>";

function checkExpression(string $_expression)
{
    $validBrackets = array (
        array('{', '}'),
        array('(', ')'),
        array('[', ']')
    );

    $expression_arr = str_split($_expression);
    $arr = [];
    foreach ($expression_arr as $ch) {
        foreach ($validBrackets as $bracket) {
            if (($ch == $bracket[1]) && (empty($arr))) {
                return false;
            }
            if ($ch == $bracket[0]) {
                array_push($arr, $bracket);
                break;
            }

            if (($ch == $bracket[1]) && !empty($arr))
            {
                if (end($arr)[0] == $bracket[0]){
                    array_pop($arr);
                    break;
                }
            }
        }
    }
    return empty($arr);
}

function runCheckExpression(string $expression)
{
    if (strlen($expression) == 0) {
        echo "Expresstion is empty";
        return;
    }
    echo "Expression: " . $expression;
    echo "<br>Result: ";
    if (checkExpression($expression)) {
        echo "Valid expression :)";
    } else {
        echo "Invalid expression :(";
    }
    echo "<br>";
}
$expression = '([]){}';
runCheckExpression($expression);

$expression = '([){}'; // invalid
runCheckExpression($expression);
echo "Test Expression: should be valid <br>";
$expression = '{}(){{({})({})({})}}()'; //
runCheckExpression($expression);
echo "Test Expression: should be invalid <br>";
$expression = '{}(){{({})({}}}()'; //
runCheckExpression($expression);
echo "Test Expression: should be Expression is empty <br>";
$expression = ''; //
runCheckExpression($expression);

//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 5.<h2/> Дан массив целых чисел. Напишите скрипт, который выводит для каждого числа количество повторов".
"(если повторов нет, то выводит число 1), при этом не используя никакой сортировки результирующего массива.<br>";
echo "<p><i> Решение в лоб, но зато работает </i></p>";
$arr = array(1, 2,3,4,5, 5,4,4,4,2);
echo "Input array<br>". implode(" ",$arr);

echo "<br>Result:";
echo "<br>";
print_r(array_count_values($arr));


//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 6.<h2/> Дан массив вида [[1,2,3], [3,4,5], [1,1,1], [4,5,6]].".
    "Необходимо найти первое число, которое больше 4, содержащееся в массиве, и вывести его.<br>";
echo "<p><i> Решение в лоб, но зато работает </i></p>";
$arr = [[1,2,3], [3,4,5], [1,1,1], [4,5,6]];
$val = -1;
foreach ($arr as $item) {
    if (max($item) > 4) {
        $val =  max($item);
        break;
    }
}

if ($val !== -1) {
    echo "<br>Result: ". $val;
} else{
    echo "<br>Not found value";
}
echo "<br>";

//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 7.<h2/> Дан массив целых чисел [0,1,2,3,4,5,6,7,8,9,10]. ".
    "Необходимо найти все варианты сумм элементов массива, которые равны 10.<br>";

echo "<p><i> Решение в лоб, но зато работает </i></p>";

$arr = [0,1,2,3,4,5,6,7,8,9,10];
$arr2 = array_reverse($arr);

function sumIsten($arr, $arr2)
{
    foreach ($arr as $a) {
        $res = 0;
        foreach ($arr2 as $b) {
            $res = $a + $b;
            if ($res == 10) {
                echo "<br> Sum: " . $a . "+" . $b . " = " . $res;
            }
            $res = 0;
        }
    }
}
sumIsten($arr, $arr2);
echo "<br>";


//-----------------------------------------------------------------
echo "<br>";
echo "<h2>TASK 8.<h2/> Дан входной массив данных вида ['name' => 'Ivan', 'age' => 25, 'weight' => 82.5].".
    "Напишите скрипт, проверяющий корректность данных, а при возникновении ошибки выбрасывающий исключение с текстом.<br>".
    "Данное исключение в дальнейшем должно перехватываться и возвращаться. Если же проверка прошла успешно,<br>".
    "то должен возвращаться соответствующий текст, и не должно выбрасываться никаких исключений.<br>";

echo "<p><i> Решено не полностью, ибо если ввести числа например 815 то оно все равно будет валидным, т.к".
    "filter_var все равно преобразует в строку - это относительно имени. Остальное вроде работает правильно</i></p>";
$inputPerson = ['name' => 'Ivan', 'age' => 25, 'weight' => 82.5];

function validateArray($val){
    try
    {
        if ( empty($val['name']) || !filter_var($val['name'], FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE)) {
            throw new Exception('Name is not valid');
        }
        if ( empty($val['age']) || !filter_var($val['age'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE)) {
            throw new Exception('Age is not valid');
        }
        if ( empty($val['weight']) || !filter_var($val['weight'], FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE)) {
            throw new Exception('Weight is not valid');
        }
        return true;
    }
    catch (Exception $ex){
        echo $ex->getMessage();
        return false;
    }
}
function runValidate($val)
{
    if (validateArray($val)) {
        echo "Valid array: <br>";
        foreach ($val as $key => $v) {
            echo "<br>" . $key . " => " . $v;
        }
    }
}
echo "Array from task<br>";
runValidate($inputPerson);

echo "Test array: should be \"Name is not valid\" <br>";
$inputPerson = ['name' => null, 'age' => 25, 'weight' => 82.5];
runValidate($inputPerson);
