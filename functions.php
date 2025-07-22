<?php
function displayAuthor(string $authorEmail, array $users): string
{
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['name'] . '(' . $user['score'] . ' points)';
        }
    }
    return 'Auteur inconnu';
}
function isValidRecipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }


    return $isEnabled;
}


function isOldestDate($date1,$date2,$format = 'Y-m-d') : bool //renvoie 0 si date1 < date2 et 1 sinon
{
    $d1 = DateTime::CreateFromFormat($format,$date1);
    $d2 = DateTime::CreateFromFormat($format,$date2);
    return $d1>=$d2;
}

function isValidFormatDate($date, $format = 'Y-m-d'): bool 
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

function isValidDate($date) : bool
{
    if(isValidFormatDate($date)){
        if(isOldestDate($date,'1995-06-16') && isOldestDate(date('Y-m-d'),$date)){
            return true;
        }
    }
    return false;
}
function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}