<template>
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Task Manager</h3>
            <button class="btn btn-outline-danger">Logout</button>
        </div>

        <div class="card p-3 mb-4">
            <div class="row g-2">
                <div class="col">
                    <input class="form-control" placeholder="Judul"/>
                </div>
                <div class="col">
                    <select class="form-select">
                        <option value="todo">To do</option>
                        <option value="progress">On Progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>
                <div class="col">
                    <input type="date" class="form-control"/>
                </div>
                <div class="col">
                    <button class="btn btn-primary w-100">Tambah</button>
                </div>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Deadline</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ini judul</td>
                    <td>ini status</td>
                    <td>ini deadline</td>
                    <td>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>