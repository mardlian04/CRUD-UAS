<?php
require_once 'config.php';

function getAllPosts() {
    global $link;
    $sql = "SELECT * FROM tbl_posts";
    $result = mysqli_query($link, $sql);
    return $result;
}

function getPostById($id) {
    global $link;
    $sql = "SELECT * FROM tbl_posts WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function createPost($title, $slug, $user_id, $content, $image) {
    global $link;
    $sql = "INSERT INTO tbl_posts (title, slug, user_id, content, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ssiss", $title, $slug, $user_id, $content, $image);
    return mysqli_stmt_execute($stmt);
}

function updatePost($id, $title, $slug, $user_id, $content, $image) {
    global $link;
    $sql = "UPDATE tbl_posts SET title = ?, slug = ?, user_id = ?, content = ?, image = ? WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "ssissi", $title, $slug, $user_id, $content, $image, $id);
    return mysqli_stmt_execute($stmt);
}

function deletePost($id) {
    global $link;
    $sql = "DELETE FROM tbl_posts WHERE id = ?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}
?>
