<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    ...
    <!-- Include the app.js file -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Material Icons -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <!-- Roboto -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700"
    />
    <!-- Roboto Mono -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto+Mono"
    />
    <!-- Material Typography -->
    <link
        rel="stylesheet"
        href="https://unpkg.com/@material/typography@13.0.0/dist/mdc.typography.css"
    />

    <!-- SMUI -->
    <link rel="stylesheet" href="https://unpkg.com/svelte-material-ui/bare.css" />
  </head>
  <body>
    <!-- Include your App Component -->
    <my-app></my-app>
    <test-component></test-component>
  </body>
</html>