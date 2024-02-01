<?php 

function get_courses()
{
    global $db;
    $query = 'SELECT * FROM courses ORDER BY courseID';

    $statement = $db->prepare($query);
    $statement->execute();

    $courses = $statement->fetchAll();
    $statement->closeCursor();

    return $courses;
}