# Shopping App - Assessment Test
This project is a two-part application combining a web-based dashboard system and a RESTful mobile API integration. The dashboard, built using a provided Bootstrap template, offers essential administrative functionalities such as sign-in, category and product listings with search and pagination, as well as an order management system displaying details like order ID, status, total amount, and date. All data is mocked, simplifying development without requiring database integration. The mobile API is designed to provide seamless communication with features like user authentication via session-based mechanisms, hierarchical category fetching, product listing with filters and pagination, cart details with products and total price, and user-specific order details. Following RESTful principles, the API returns JSON-formatted data with proper HTTP status codes, ensuring efficient and secure interactions for future mobile applications.

## Login Credentails
- johndoe@example.com          
- password123

### Login Page
1. Test Case : Form Loads Correctly
    - The login form is displayed with input fields for email and password.
    - A "Sign In" button is visible.
2. Test Case : Submit Form with Valid Credentials
    - Enter a valid email (e.g., user@example.com).
    - Enter a valid password.
    - Click the "Sign In" button.

### Dashboard
1. Test Case : Side Menu
The navigation menu consists of the following sections:
 - Dashboard
    Redirects to the main dashboard view of the application.
 - Product (Expandable Submenu)
    Category: Links to the product category management page.
    Details: Links to the product details management page.
 - Orders
     Links to the orders report page.
 - Logout
     Logs out the user and redirects to the login page.
2. Test Case : Page Structure
The Dashboard page provides a high-level overview of important metrics such as total orders, pending orders, dispatched orders, and delivered orders. It also features a dynamic section for displaying product categories, which is fetched using an AJAX request.
    1. Statistics Section
        Displays 4 cards with different order-related metrics:
            - Total Orders
            - Pending Orders
            - Dispatched Orders
            - Delivered Orders
    2. Categories Section
        Displays a dynamic list of product categories fetched from the server.

### Product - Category
The Product Category page allows users to view a list of product categories, with a search functionality to filter categories by name. It supports pagination for navigating through large sets of categories.

### Product - Details
The Product List page provides an interface to view and search products. It allows filtering products by name and category, displaying product details such as name, category, price, and image. Pagination is also included for large product datasets.

### Orders
The Order List page provides an interface for displaying and managing customer orders. It shows key order details such as order ID, product, category, quantity, total price, status, and order date. The page includes pagination to navigate through multiple pages of orders.
