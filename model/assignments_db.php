<?php 

function get_assignments_by_course($course_id)
{
    global $db;
    if ($course_id) {
        $query = 'SELECT A.id, A.description, C.courseName 
                FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID 
                WHERE A.courseID = :course_id ORDER BY A.id';
    } else {
        $query = 'SELECT A.id, A.description, C.courseName 
                FROM assignments A LEFT JOIN courses C ON A.courseID = C.courseID 
                ORDER BY C.courseID';
    }

    $statement = $db->prepare($query);
    $statement->bindValue(':course_id', $course_id);
    $statement->execute();

    $assignments = $statement->fetchAll();
    $statement->closeCursor();

    return $assignments;
}