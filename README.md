# Circle Link Health

Build a Laravel application for a medical practice that helps patients manage their blood pressure. 

**The application should have below features**

- [ ] A page for creating practice staff users (Roles: Admin, Nurse, Doctor)
- [ ] A page for creating patients
- [ ] A page to record blood pressure observations for patients
- [ ] Export CSV of practice users (Admin, Nurse, Doctor)
- [ ] Export CSV of patient blood pressure observations 

**Dev requirements**

- [ ] Use Laravel Excel to generate CSV
- [x] Use Livewire Datatables
- [x] Use tailwind css
- [ ] Write tests
- [x] Use Alpine/Livewire, not Vue.js or anything else
- [ ] Create a seeder that seeds the DB with 10000 practice staff, and 50000 patients. We will run this seeder when evaluating your project. The exports have to work.

**ACL**

- [ ] Any staff member can see all patients in it, and create blood pressure observations for them
- [ ] Only Admins can “Export CSV of practice staff”
- [ ] Admins and Doctors can “Export CSV of patient Blood Pressure”

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
