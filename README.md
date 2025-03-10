## Inertia react js crud

- Create project composer create-project laravel/laravel example-app
- Create auth using breeze `composer require laravel/breeze --dev`
- Install breeze `php artisan breeze:install` and choose `React with Inertia`
- Create Migration,Model,Controller and Create Route `php artisan migrate` `php artisan make:model Student` `php artisan make:controller StudentController`
- Install daisy UI and Add daisyUI to tailwind.config.js `npm i -D daisyui@latest`
- Create vue component files:
1) resources/js/Pages/StudentsDashboard.jsx
2) resources/js/Components/AddStudentButton.jsx
3) resources/js/Components/ModalUpdate.jsx
4) resources/js/Components/ModalDelete.jsx
- Inside the AuthenticatedLayout file need to add link on header for Students page -->resources/js/Layouts/AuthenticatedLayout.jsx
- Run php artisan serve npm run build