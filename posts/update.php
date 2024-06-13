<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = getPostById($id);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $user_id = $_POST['user_id'];
    $content = $_POST['content'];
    $image = $_POST['image'];
    
    if(updatePost($id, $title, $slug, $user_id, $content, $image)){
        header("location: index.php");
        exit();
    } else {
        echo "Something went wrong. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <nav class="bg-indigo-700 text-white">
        <div class="container mx-auto px-4 py-4 flex flex-wrap items-center justify-between">
            <h1 class="text-2xl">CRUD MARDLIAN</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="index.php" class="hover:underline">Home</a></li>
                    <li><a href="create.php" class="hover:underline">Create Post</a></li>
                    <li><a href="read.php" class="hover:underline">Read Post</a></li>
                </ul>
            </nav>
        </div>
    </nav>
    <header class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Update post !</h1>

                    <p class="mt-1.5 text-sm text-gray-500">silakan membuat postingan baru! 🎉</p>
                </div>

                <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                    <button
                        class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 bg-white px-5 py-3 text-gray-500 transition hover:text-gray-700 focus:outline-none focus:ring"
                        type="button">
                        <span class="text-sm font-medium"> View Posts </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </button>

                    <button
                        class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring"
                        type="button">
                        Create Post
                    </button>
                </div>
            </div>
        </div>
    </header>
    <h1 class="text-3xl text-center font-bold mb-4">Update Post</h1>
    <form action="update.php" method="post"
        class="container mx-auto flex-grow bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Title</label>
            <input type="text" name="title" value="<?php echo $post['title']; ?>"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Slug</label>
            <input type="text" name="slug" value="<?php echo $post['slug']; ?>"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">User ID</label>
            <input type="number" name="user_id" value="<?php echo $post['user_id']; ?>"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Content</label>
            <textarea name="content"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required><?php echo $post['content']; ?></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Image</label>
            <input type="text" name="image" value="<?php echo $post['image']; ?>"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="flex items-center justify-between">
            <input type="submit" value="Update"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        </div>
    </form>
    <footer class="bg-indigo-700 text-white text-center py-4">
        <div class="container mx-auto px-4">
            <p>M. MARDLIAN NUROFIQ</p>
            <p>23091397105</p>
        </div>
    </footer>
</body>

</html>