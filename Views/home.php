<?php include __DIR__ . '/layouts/header.php'; ?>


<section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-12 col-xl-12">
                <div class="card rounded-3">
                    <div class="card-body p-4">

                        <h4 class="text-center my-3 pb-3">To Do App</h4>

                        <form action="/create" method="post"
                              class="row g-3 justify-content-center align-items-center mb-4 pb-2">
                            <div class="col-6">
                                <div class="form-outline">
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-outline">
                                    <input type="email" id="form1" name="email" placeholder="Email"
                                           class="form-control"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-outline">
                                    <textarea name="text" id="text" rows="5" class="form-control"
                                              placeholder="Text"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle"
                                    type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Order
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item"
                                       href="?order_column=name&order_direction=desc">Name
                                        <i class="bi bi-sort-down"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="?order_column=name&order_direction=asc">Name
                                        <i class="bi bi-sort-up"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="?order_column=email&order_direction=desc">Email
                                        <i class="bi bi-sort-down"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="?order_column=email&order_direction=asc">Email
                                        <i class="bi bi-sort-up"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="?order_column=status&order_direction=desc">Status
                                        <i class="bi bi-sort-down"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                       href="?order_column=status&order_direction=asc">Status
                                        <i class="bi bi-sort-up"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <table class="table mb-4">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Text</th>
                                <th scope="col">Status</th>
                                <?php if (auth()): ?>
                                    <th scope="col" class="text-end">Actions</th>
                                <?php endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($variables['tasks'] as $task): ?>
                                <tr>
                                    <td><?= $task['name'] ?></td>
                                    <td><?= $task['email'] ?></td>
                                    <td><?= $task['text'] ?>
                                    </td>
                                    <td><?= !$task['status'] ? 'in progress' : 'Done' ?></td>
                                    <?php if (auth()): ?>
                                        <td class="text-end">
                                            <?php if (!$task['status']): ?>
                                                <form action="/update/status" method="post">
                                                    <button data-text="<?= $task['text'] ?>"
                                                            data-id="<?= $task['id'] ?>"
                                                            data-bs-toggle="modal" id="modalBtn"
                                                            data-bs-target="#editModal"
                                                            type="button"
                                                            class="btn btn-success ms-1">Edit
                                                    </button>
                                                    <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                                    <button type="submit" class="btn btn-success ms-1">Finished</button>
                                                </form>
                                            <?php endif; ?>

                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">

                                <li class="page-item <?= (current_page() == 1) ? 'disabled' : null ?> ">
                                    <a class="page-link" href="?page=<?= current_page() - 1 ?><?= get_order_params() ?>">Previous</a></li>
                                <?php for ($i = 1; $i <= ceil($task['total'] / 3); $i++): ?>
                                    <li class="page-item <?= (current_page() == $i) ? 'active' : null ?>"><a
                                                href="?page=<?= $i ?><?= get_order_params() ?>" class="page-link"><?= $i ?></a></li>
                                <?php endfor; ?>
                                <li class="page-item <?= (current_page() == ceil($task['total'] / 3)) ? 'disabled' : null ?> ">
                                    <a class="page-link" href="?page=<?= current_page() + 1 ?><?= get_order_params() ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="/update" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <div class="form-outline">
                                <input type="hidden" name="id">
                                <textarea name="text" id="text" rows="5" class="form-control"
                                          placeholder="Text"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php require_once __DIR__ . './layouts/footer.php'; ?>
