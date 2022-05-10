<div class="col-sm-auto bg-light sticky-top shadow">
                <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                    <a href="/" class="d-block p-3 link-light text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                        <i class="bi-book-fill fs-1" style="color: #A85CF9;"></i>
                    </a>
                    <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link py-3 px-2" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Home">
                                <i class="bi-speedometer fs-4" style="color: #A85CF9;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/nota" class="nav-link py-3 px-2" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Orders">
                                <i class="bi-table fs-4" style="color: #A85CF9;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/book" class="nav-link py-3 px-2" title="Devices" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="bi-grid-fill fs-4" style="color: #A85CF9;"></i>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/user" class="nav-link py-3 px-2" title="Users" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customers">
                                <i class="bi-people-fill fs-4" style="color: #A85CF9;"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-person-circle fs-4" style="color: #A85CF9;"></i>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                            <li><a class="dropdown-item" href="/admin/user/edit.php?id=<?= $_SESSION['user']['id'] ?>">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="/admin">Profile</a></li>
                            <li>
                              <form action="../../logout.php" method="get">
                                <button style="color: #A85CF9;" type="submit" class="btn dropdown-item" value="Logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                              </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>