
---

# Laravel Filter Providers

A Laravel 10 application showcasing various frontend optimization techniques for displaying and filtering a large dataset of service providers.

## 🔗 Live Demo

Access the live application here: [http://143.198.128.235/providers](http://143.198.128.235/providers)

## 📂 Project Overview

This project demonstrates three different implementations for listing and filtering approximately 1,500 service providers:

1. **Basic Version**: Utilizes Blade templates for server-side rendering.
2. **Optimized Version**: Incorporates lazy loading of images to enhance performance.
3. **Vue.js Version**: Employs Vue.js with virtual scrolling (`useVirtualList`) for efficient rendering of large lists.([LogRocket Blog][1])

Each version is accessible via the navigation bar, allowing users to compare performance and functionality.

## 🛠️ Features

* **Category Filtering**: Users can filter providers based on selected categories.
* **Provider Details**: Clicking on a provider card reveals detailed information.
* **Lazy Loading**: Images are loaded lazily to reduce initial load times.
* **Virtual Scrolling**: Implemented in the Vue.js version to efficiently handle large datasets.
* **Performance Metrics**: Displays metrics such as Time to First Byte (TTFB), First Contentful Paint (FCP), and Time to Interactive (TTI).

## ⚙️ Technologies Used

* **Backend**: Laravel 12, PHP 8.3
* **Frontend**: Blade, Vue.js 3, Vite
* **Database**: MySQL
* **Caching**: Redis
* **Containerization**: Docker, Docker Compose
* **Web Server**: Nginx

## 🚀 Getting Started

### Prerequisites

* Docker
* Docker Compose([Laravel Daily][2])

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/vladimir-pitchkurov/laravel_filter_providers.git
   cd laravel_filter_providers
   ```



2. Copy the example environment file and configure it:

   ```bash
   cp .env.example .env
   ```



3. Build and start the containers:([Sentry][3])

   ```bash
   docker-compose up -d --build
   ```



4. Install PHP dependencies:([Phppot][4])

   ```bash
   docker-compose exec app composer install
   ```



5. Run migrations and seed the database:

   ```bash
   docker-compose exec app php artisan migrate --seed
   ```



6. Install Node.js dependencies and build assets:([Medium][5])

   ```bash

   docker-compose exec app npm install
   docker-compose exec app npm run build

      ```



7. Access the application at [http://localhost/providers](http://localhost/providers).

## 📊 Performance Comparison

The application provides three versions to compare performance:

* **Basic Version**: Standard server-side rendering with Blade templates.
* **Optimized Version**: Adds lazy loading for images to improve load times.
* **Vue.js Version**: Utilizes Vue.js with virtual scrolling for efficient rendering of large lists.([Medium][6], [LogRocket Blog][1])

Performance metrics such as TTFB, FCP, and TTI are displayed to help assess the effectiveness of each optimization strategy.

## 🧪 Potential Enhancements

* **Testing**: Implement unit and integration tests to ensure application reliability.
* **Continuous Integration/Continuous Deployment (CI/CD)**: Set up automated pipelines for testing and deployment.
* **Monitoring**: Integrate monitoring tools to track application performance and errors.
* **Scalability**: Optimize the application for handling larger datasets and higher traffic volumes.([Medium][7])

## 📄 License

This project is licensed under the MIT License.

---

For more information, visit the [GitHub repository](https://github.com/vladimir-pitchkurov/laravel_filter_providers).

---

[1]: https://blog.logrocket.com/create-performant-virtual-scrolling-list-vuejs/?utm_source=chatgpt.com "Create a performant virtual scrolling list in Vue.js - LogRocket Blog"
[2]: https://laraveldaily.com/post/laravel-vite-manifest-not-found-at-manifest-json?utm_source=chatgpt.com "Laravel: \"Vite manifest not found at manifest.json\" - What To Do?"
[3]: https://sentry.io/answers/how-do-i-fix-the-laravel-error-vite-manifest-not-found/?utm_source=chatgpt.com "How do I fix the Laravel error: Vite manifest not found? - Sentry"
[4]: https://phppot.com/php/php-laravel-project-example/?utm_source=chatgpt.com "PHP Laravel Project Example for Beginners - Phppot"
[5]: https://medium.com/%40murilolivorato/creating-filters-in-laravel-a-comprehensive-tutorial-1a3831b383d0?utm_source=chatgpt.com "Creating Filters in Laravel : A Comprehensive Tutorial | by Murilo ..."
[6]: https://medium.com/%40jayprakashj/service-container-service-providers-in-laravel-11-binding-resolvers-and-dependency-injection-975aaa051601?utm_source=chatgpt.com "Service Container & Service Providers in Laravel 11: Binding, Resolvers ..."
[7]: https://heygabriel.medium.com/laravel-vite-manifest-not-found-af580bfb794a?utm_source=chatgpt.com "Laravel vite manifest not found - Gabriel Guerra"
