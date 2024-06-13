<?php
require 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = getPostById($id);
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
                    <li><a href="create.php" class="hover:underline">Read Post</a></li>
                    <li><a href="create.php" class="hover:underline">Update Post</a></li>
                </ul>
            </nav>
        </div>
    </nav>
    <header class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">Postingan mardlian !</h1>

                    <p class="mt-1.5 text-sm text-gray-500">silakan membuat postingan baru! 🎉</p>
                </div>

                <div class="mt-4 flex flex-col gap-4 sm:mt-0 sm:flex-row sm:items-center">
                    <a href="create.php"
                        class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-200 bg-indigo-700 px-5 py-3 text-white transition hover:text-white focus:outline-none focus:ring"
                        type="button">
                        <span class="text-sm font-medium"> Create Posts </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8 flex-grow overflow-x-auto">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Title</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-900"> <?php echo $post['title']; ?>
                    </td>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <tr class="odd:bg-gray-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Slug</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $post['slug']; ?></td>
                </tr>

                <tr class="odd:bg-gray-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">User ID</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"> <?php echo $post['user_id']; ?></td>
                </tr>

                <tr class="odd:bg-gray-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Content</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $post['content']; ?></td>
                </tr>

                <tr class="odd:bg-gray-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Image</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $post['image']; ?></td>
                </tr>
                <tr class="odd:bg-gray-50">
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Date</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <?php echo date('Y-m-d', strtotime($post['created_at'])); ?></td>
                </tr>
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