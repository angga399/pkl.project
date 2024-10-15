
    <x-slot:title>{{$title}}</x-slot:title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk ikon love dan aksi CRUD -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <h2>welcome admin</h2>

    <body class="bg-gray-100">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Navbar -->
            <header class="flex justify-between items-center bg-white py-4 px-6 shadow-md">
                <h1 class="text-xl font-semibold">Dashboard Overview</h1>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search..." class="px-4 py-2 bg-gray-100 rounded-md">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded-md">New Report</button>
                </div>
            </header>

            <!-- Content -->
            <main class="mt-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="bg-blue-100 p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <i class="fas fa-heart text-blue-700 text-3xl"></i>
                        <div>
                            <h2 class="text-lg font-semibold mb-2 text-blue-700">Total Users</h2>
                            <p class="text-3xl font-bold text-blue-900">1,245</p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-green-100 p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <i class="fas fa-heart text-green-700 text-3xl"></i>
                        <div>
                            <h2 class="text-lg font-semibold mb-2 text-green-700">Active Sessions</h2>
                            <p class="text-3xl font-bold text-green-900">412</p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-yellow-100 p-6 rounded-lg shadow-md flex items-center space-x-4">
                        <i class="fas fa-heart text-yellow-700 text-3xl"></i>
                        <div>
                            <h2 class="text-lg font-semibold mb-2 text-yellow-700">New Orders</h2>
                            <p class="text-3xl font-bold text-yellow-900">78</p>
                        </div>
                    </div>
                </div>

                <!-- Grafik -->
                <section class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Sales Overview</h2>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <canvas id="salesChart"></canvas>
                    </div>
                </section>

                <!-- Tabel dengan CRUD -->
                <section class="mt-8">
                    <h2 class="text-xl font-semibold mb-4">Recent Transactions</h2>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Customer</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Amount</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="text-left py-3 px-4">#1234</td>
                                    <td class="text-left py-3 px-4">John Doe</td>
                                    <td class="text-left py-3 px-4">$500</td>
                                    <td class="text-left py-3 px-4 text-green-600">Completed</td>
                                    <td class="text-left py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i>edit</button>
                                        <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i>delate</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left py-3 px-4">#1235</td>
                                    <td class="text-left py-3 px-4">Jane Smith</td>
                                    <td class="text-left py-3 px-4">$300</td>
                                    <td class="text-left py-3 px-4 text-yellow-600">Pending</td>
                                    <td class="text-left py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i>edit</button>
                                        <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i>dalate</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left py-3 px-4">#1236</td>
                                    <td class="text-left py-3 px-4">David Brown</td>
                                    <td class="text-left py-3 px-4">$800</td>
                                    <td class="text-left py-3 px-4 text-red-600">Failed</td>
                                    <td class="text-left py-3 px-4">
                                        <button class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i>edit</button>
                                        <button class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i>delate</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>

        <!-- Script Chart.js -->
        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');
            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Sales',
                        data: [1200, 1900, 3000, 5000, 2300, 3200, 4000],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </body>

