<?php
require 'db.php';
$posts = getAllPosts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD MARDLIAN</title>
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
                    <li><a href="update.php" class="hover:underline">Update Post</a></li>
                </ul>
            </nav>
        </div>
    </nav>
    <header class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Welcome Back, crud mardlian !</h1>

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

                    <a href="create.php" class="block rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition
                        hover:bg-indigo-700 focus:outline-none focus:ring">
                        Create Post
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8 flex-grow">
        <h1 class="text-3xl font-bold mb-4">Posts</h1>
        <table class="w-full border-collapse bg-white shadow-md">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($post = mysqli_fetch_assoc($posts)): ?>
                <tr>
                    <td class="border text-center px-4 py-2"><?php echo $post['id']; ?></td>
                    <td class="border px-4 py-2"><?php echo $post['title']; ?></td>
                    <td class="border px-4 py-2"><?php echo $post['image']; ?></td>
                    <td class="border text-center px-4 py-2 text-center">
                        <a href="read.php?id=<?php echo $post['id']; ?>" class="text-blue-500 hover:underline">View</a>
                        <a href="update.php?id=<?php echo $post['id']; ?>"
                            class="text-yellow-500 hover:underline">Edit</a>
                        <a href="delete.php?id=<?php echo $post['id']; ?>"
                            class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <footer class="bg-indigo-700 text-white text-center py-4">
        <div class="container mx-auto px-4">
            <p>M. MARDLIAN NUROFIQ</p>
            <p>23091397105</p>
        </div>
    </footer>
</body>

</html>