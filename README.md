# Circle Link Health

Build a Laravel application for a medical practice that helps patients manage their blood pressure. 

***References***
Ray Dump Debugging: http://myray.app/

**The application should have below features**

- [x] A page for creating practice staff users (Roles: Admin, Nurse, Doctor)
- [x] A page for creating patients
- [X] A page to record blood pressure observations for patients
- [x] Export CSV of practice users (Admin, Nurse, Doctor)
- [x] Export CSV of patient blood pressure observations 

**Dev requirements**

- [x] Use Laravel Excel to generate CSV
- [x] Use Livewire Datatables
- [x] Use tailwind css
- [x] Write tests
- [x] Use Alpine/Livewire, not Vue.js or anything else
- [x] Create a seeder that seeds the DB with 10000 practice staff, and 50000 patients. We will run this seeder when evaluating your project. The exports have to work.

**ACL**

- [x] Any staff member can see all patients in it, and create blood pressure observations for them
- [x] Only Admins can “Export CSV of practice staff”
- [x] Admins and Doctors can “Export CSV of patient Blood Pressure”

## Installation

1. Clone the repository
```
git clone https://github.com/000kelvin/circlelinkhealth
```

2. Create a local environment and update the variables
```
cp .env.example .env
```

3. Start Sail Up
```
./vendor/bin/sail up
```
Please check this doc to add sail to configure a bash alias for sail: https://laravel.com/docs/8.x/sail#configuring-a-bash-alias 

4. Install all composer dependencies
```
sail composer install
```

5. Install all npm dependencies
```
sail npm install
```

6. Genarate an application key
```
sail artisan key:generate
```

7. Run all migrations
```
sail artisan migrate
```

8. Run all seeders
```
sail artisan db:seed
```

9. Run tests
```
sail test
```
