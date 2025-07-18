
<?php
$usersStatement = $db->prepare('SELECT id,name,email,score,password FROM people WHERE score>:SpeScore');
$usersStatement->execute([
    'SpeScore' => -1
] 
);
$users = $usersStatement->fetchAll();

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'bep@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'second@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'trois@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => 'Etape 1 : prenez une belle salade',
        'author' => 'bep@exemple.com',
        'is_enabled' => true,
    ],
];
?>