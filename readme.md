# mpm-rounting

Simple and Powerful PHP Routing for Your Web Applications

## Table of Contents
- Introduction
- Features
- Getting Started
  - Prerequisites
  - Installation
- Usage
- Examples
- Contributing
- License
- Acknowledgements

## Introduction

`mpm-routing` is your go-to solution for routing in PHP web applications. It simplifies the process of defining routes, matching requests, and handling routing errors.

## Features

- **Simplified Routing:** Define routes effortlessly using HTTP methods like GET and POST, making route setup a breeze.
- **Flexible Route Matching:** Match routes based on request URIs and HTTP methods, allowing for dynamic and precise routing.
- **Custom Exception Handling:** Handle routing errors with ease using custom exception handling. Detect and respond to issues gracefully.
- **Modular and Lightweight:** `mpm-routing` is designed to be lightweight and easy to integrate into your PHP project, ensuring minimal overhead.
- **Additional Routes:** Organize your routes by including additional route files, making your codebase clean and maintainable.
- **Listing Routes:** Retrieve a list of all registered routes programmatically, helping you understand your application's routing structure.
- **Community Support:** Join a thriving community of developers using `mpm-routing` and benefit from ongoing updates and improvements.
- **Open Source:** This project is open source and available under the MIT License, so you can use it in your projects with confidence.
- **Responsive Development:** Enjoy responsive development with regular updates and contributions from the community, ensuring your routing needs are met.
- **Easy Integration:** Seamlessly integrate `mpm-routing` into your existing PHP projects or use it in new ones without complex setup.

Choose `mpm-routing` for a powerful yet easy-to-use routing solution in your PHP web applications.

## Getting Started

### Prerequisites

- php >= 8.0
- mpm\http >= 1.1

### Installation

- ``` composer require mpm\routing ```

## Usage

  #### 1. Define basic routes using HTTP methods like GET and POST. 
      Specify the route URI and the associated controller or handler function. 
      ```
        // Define a GET route
        Route::get('/home', 'HomeController@index');
        
        // Define a POST route
        Route::post('/submit', 'FormController@process');
      ``` 
      
  #### 2. Handling Dynamic Routes
        Match dynamic routes using route parameters enclosed in curly braces `{}`. These parameters capture values from the URL for further processing.
        
        ```<?php 
          // Match a dynamic route with a parameter
          Route::get('/user/{id}', 'UserController@show');
        
          // Access the captured parameter in the handler function
          public function show($id) {
            // Use $id to fetch and display user information
          }
        ``` 
        
## Examples
  #### 1. Define Routes 
  ```php
    // Define a GET route
    Route::get('/home', 'HomeController@index');
    
    // Define a POST route
    Route::post('/submit', 'FormController@process');
  ``` 
  
  ### 2. Handling Dynamic Routes
        Match dynamic routes using route parameters enclosed in curly braces `{}`. These parameters capture values from the URL for further processing.
        
        ```
        // Match a dynamic route with a parameter
        Route::get('/user/{id}', 'UserController@show');
        
        // Access the captured parameter in the handler function
        public function show($id) {
            // Use $id to fetch and display user information
        } 
        ``` 
        
  ### 3. Custom Exception Handling
        
        Handle routing errors using custom exception handling. When a route is not found or other routing errors occur, a `RouteException` is thrown.
        
        ```
        try {
            // Attempt to match and execute a route
            $request = new Request();
            Router::run($request);
        } catch (RouteException $e) {
            // Handle the routing exception
            echo 'Routing Error: ' . $e->getMessage();
            // You can also log the exception for debugging purposes.
        } 
        ``` 
  ### 4. Including Additional Routes
            Organize your routes by including additional route files. This helps keep your codebase clean and maintainable.
    ```
      // Include routes from an additional file
      Router::includes('path/to/extra-routes.php');
    ```
  
  ### 5. Listing Registered Routes
    Retrieve a list of all registered routes programmatically to understand your application's routing structure.
    ```markdown
    // Get a list of registered routes
    $routes = Router::routes();
    ```
    
    
## Contributing

We welcome contributions from the community to enhance and improve the `mpm-routing` module. Whether you want to report a bug, propose new features, or submit code changes, your contributions are valuable.
To contribute to this project, please follow these guidelines:
1. **Fork the Repository:** Start by forking this repository to your GitHub account.
2. **Create a Branch:** Create a new branch for your contribution. Use a descriptive branch name related to your fix or feature.
3. **Make Changes:** Make your desired changes or improvements to the codebase. Ensure that your code adheres to the project's coding standards.
4. **Write Tests:** If your contribution involves code changes, write relevant tests to ensure the functionality works as expected.
5. **Commit Changes:** Commit your changes with clear and concise commit messages.
6. **Push to Your Fork:** Push the changes to your forked repository on GitHub.
7. **Create a Pull Request (PR):** Open a pull request against the main branch of this repository. Provide a detailed description of your changes, why they are necessary, and any related issues.
8. **Review and Collaboration:** Participate in the discussion on your PR. Address any feedback or concerns raised during the review process.
9. **Continuous Integration:** Ensure that your changes pass the automated tests and do not introduce any new issues.
10. **Merging:** Once your PR is approved, it will be merged into the main branch. Congratulations on your contribution!

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
