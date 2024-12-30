<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Revenue;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk tabel Roles
        Role::create(['name' => 'super_admin', 'description' => 'Full access to the system']);
        Role::create(['name' => 'admin', 'description' => 'Manage operations']);
        Role::create(['name' => 'staff', 'description' => 'Execute assigned tasks']);

        // Seeder untuk tabel Users
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => bcrypt('password'),
            'role_id' => 3,
            'no_whatsapp' => '123456789',
            'photo' => 'profile/profile_' . Str::random(10) . '.jpg',
            'address' => 'Staff Address',
        ]);

        // Seeder untuk tabel Customers
        Customer::create(['name' => 'Customer A', 'email' => 'customerA@example.com', 'phone' => '123456789', 'address' => 'Address A']);
        Customer::create(['name' => 'Customer B', 'email' => 'customerB@example.com', 'phone' => '987654321', 'address' => 'Address B']);

        // Seeder untuk tabel Vendors
        Vendor::create(['name' => 'Vendor A', 'email' => 'vendorA@example.com', 'phone' => '123456789', 'address' => 'Vendor Address A']);
        Vendor::create(['name' => 'Vendor B', 'email' => 'vendorB@example.com', 'phone' => '987654321', 'address' => 'Vendor Address B']);

        // Seeder untuk tabel Projects
        Project::create([
            'name' => 'Project 1',
            'description' => 'Description for Project 1',
            'category' => 'rencana',
            'customer_id' => 1,
            'start_date' => '2024-01-01',
            'end_date' => '2024-06-01',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Project::create([
            'name' => 'Project 2',
            'description' => 'Description for Project 2',
            'category' => 'berlangsung',
            'customer_id' => 2,
            'start_date' => '2024-02-01',
            'end_date' => '2024-07-01',
            'created_by' => 2,
            'updated_by' => 2,
        ]);

        // Seeder untuk tabel Tasks
        Task::create([
            'project_id' => Project::where('name', 'Project 1')->first()->id, // Ambil UUID
            'title' => 'Task 1',
            'user_id' => 3,
            'description' => 'Task 1 description',
            'status' => 'to_do',
            'due_date' => '2024-03-01',
        ]);

        Task::create([
            'project_id' => Project::where('name', 'Project 2')->first()->id, // Ambil UUID
            'title' => 'Task 2',
            'user_id' => 3,
            'description' => 'Task 2 description',
            'status' => 'in_progress',
            'due_date' => '2024-04-01',
        ]);

        // Seeder untuk tabel Revenues
        Revenue::create(['project_id' => Project::where('name', 'Project 1')->first()->id, 'amount' => 5000000.00, 'revenue_date' => '2024-05-01']);
        Revenue::create(['project_id' => Project::where('name', 'Project 2')->first()->id, 'amount' => 10000000.00, 'revenue_date' => '2024-06-01']);

        Payment::create([
            'revenue_id' => Revenue::where('project_id', Project::where('name', 'Project 1')->first()->id)->first()->id,
            'payment_name' => 'Pembayaran Cicilan ' . Str::random(5),
            'payment_type' => rand(0, 1) == 0 ? 'cicilan' : 'transfer', // Random cicilan atau transfer
            'amount_paid' => 1000000, // Jumlah yang dibayar secara acak
            'payment_date' => now()->subDays(rand(1, 30)), // Tanggal pembayaran acak
            'payment_proof' => 'proof/payment_' . Str::random(10) . '.jpg', // Nama file bukti pembayaran
        ]);

        Payment::create([
            'revenue_id' => Revenue::where('project_id', Project::where('name', 'Project 1')->first()->id)->first()->id,
            'payment_name' => 'Pembayaran Cicilan ' . Str::random(5),
            'payment_type' => rand(0, 1) == 0 ? 'cicilan' : 'transfer', // Random cicilan atau transfer
            'amount_paid' => 2000000, // Jumlah yang dibayar secara acak
            'payment_date' => now()->subDays(rand(1, 30)), // Tanggal pembayaran acak
            'payment_proof' => 'proof/payment_' . Str::random(10) . '.jpg', // Nama file bukti pembayaran
        ]);

        Invoice::create([
            'project_id' => Project::where('name', 'Project 1')->first()->id,
            'invoice_name' => 'Invoice ' . Str::random(5),
            'invoice_date' => now()->subDays(rand(1, 30)),
            'due_date' => now()->addDays(rand(1, 30)),
            'amount' => 5000000,
            'status' => 'draft',
            'no_invoice' => 'INV-' . Str::random(5),
        ]);

        InvoiceDetail::create([
            'invoice_id' => Invoice::where('project_id', Project::where('name', 'Project 1')->first()->id)->first()->id,
            'description' => 'Biaya desain',
            'amount' => 1000000,
        ]);
    }
}
