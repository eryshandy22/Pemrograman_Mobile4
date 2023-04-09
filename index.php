<!DOCTYPE html>
<html>

<head>
    <title>Mahasiswa TI.20.A.2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    $linksPerPage = 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    $data = file_get_contents('https://api.steinhq.com/v1/storages/642110d4eced9b09e9c62384/20A2');

    $links = json_decode($data, true);
    $totalLinks = count($links);
    $totalPages = ceil($totalLinks / $linksPerPage);

    $currentLinks = array_slice($links, ($page - 1) * $linksPerPage, $linksPerPage);
    ?>

    <div class="container mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($currentLinks as $index => $link) { ?>
                    <tr>
                        <td><?php echo (($page - 1) * $linksPerPage + $index + 1); ?></td>
                        <td><?php echo $link['NIM']; ?></td>
                        <td><?php echo $link['Nama']; ?></td>
                        <td><?php echo $link['1']; ?></td>
                        <td><?php echo $link['2']; ?></td>
                        <td><?php echo $link['3']; ?></td>
                        <td><?php echo $link['4']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item<?php echo ($i == $page ? ' active' : ''); ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>