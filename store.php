<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo= new PDO($dsn,'root','');
/* echo "<pre>";
print_r($_POST);
echo "</pre>"; */ 

foreach($_POST as $i=>$item){
    echo $i.'->'.$item;
    echo "<br>";
    if($item == null|| $item ==''){
        echo "空值";
        header("location:edit.php?id={$_POST['id']}&error=欄位不可為空");
        exit();
    }
}

$cols =[];
foreach($_POST as $key => $value){
    if($key !='id'){
        $cols[]="`$key` ='$value'";
    }
}

$sql="UPDATE `students` SET ".join("," , $cols)." WHERE `id` ='{$_POST['id']}'" ;

echo $sql;
echo $pdo->exec($sql);

header("location:index.php");










