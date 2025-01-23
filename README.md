# Shopping App - Assessment Test
This project is a two-part application combining a web-based dashboard system and a RESTful mobile API integration. The dashboard, built using a provided Bootstrap template, offers essential administrative functionalities such as sign-in, category and product listings with search and pagination, as well as an order management system displaying details like order ID, status, total amount, and date. All data is mocked, simplifying development without requiring database integration. The mobile API is designed to provide seamless communication with features like user authentication via session-based mechanisms, hierarchical category fetching, product listing with filters and pagination, cart details with products and total price, and user-specific order details. Following RESTful principles, the API returns JSON-formatted data with proper HTTP status codes, ensuring efficient and secure interactions for future mobile applications.

## Login Credential
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
 - Dashboard :
    Redirects to the main dashboard view of the application.
 - Product (Expandable Submenu) :
    Category: Links to the product category management page.
    Details: Links to the product details management page.
 - Orders :
     Links to the orders report page.
 - Logout :
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

## Mobile API

### 1. Login
   
- Endpoint
POST /api/v1/login
- Description
This API allows users to log in by providing their email and password. If the credentials are valid, it returns a success response with an authentication token.
- Request
Headers: Accept: application/json 
- body   : {
  "email": "johndoe@example.com",
  "password": "password123"
}
- success response : {
  "code": 200,
  "status": "success",
  "message": "Login successful.",
  "token": "your_generated_token_here"
}
- bad request : {
  "code": 400,
  "message": "The email field is required.",
  "status": "error"
}
- Unauthorized : {
  "code": 401,
  "status": "Unauthorized",
  "message": "Invalid email or password."
}

### 2. Get Product Categories API
- Endpoint :
GET /api/v1/category
- Description :
This API retrieves a list of all product categories, including the category name, description, and an image. If no image is found, a default "no-image" is returned. 
- Request :
Headers:
Accept: application/json, Authorisation: Bearer your_token
- body : No parameters are required for this API.
- success response : {
  "code": 200,
  "status": "success",
  "data": [
    {
      "id": 1,
      "category_name": "Electronics",
      "description": "Devices and gadgets",
      "cate_image": "http://example.com/images/product/electronics.jpg"
    },
    {
      "id": 2,
      "category_name": "Furniture",
      "description": "Home and office furniture",
      "cate_image": "http://example.com/images/product/furniture.jpg"
    }
  ]
}
- error response : {
  "code": 400,
  "status": "error",
  "data": "No data found"
}

### 3. Get Product Details API
- Endpoint :
GET /api/v1/product-details
- Description :
This API retrieves product details, including product name, price, image, and category. It supports filtering by product_name and category_id through query parameters.
- Request :
Headers:
Accept: application/json, Authorisation: Bearer your_token
- body : {
  "product_name" : "shirt",
  "category_id" : 1 
  } (optional parameters)
- Success Response : {
  "code": 200,
  "status": "success",
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "category_id": 1,
        "product_name": "Smartphone XYZ",
        "product_price": 299.99,
        "product_image": "smartphone_xyz.jpg",
        "category_name": "Electronics",
        "product_image_url": "http://example.com/images/product/smartphone_xyz.jpg"
      },
      {
        "id": 2,
        "category_id": 1,
        "product_name": "Smartwatch ABC",
        "product_price": 129.99,
        "product_image": "smartwatch_abc.jpg",
        "category_name": "Electronics",
        "product_image_url": "http://example.com/images/product/smartwatch_abc.jpg"
      }
    ],
    "first_page_url": "http://example.com/api/product-details?page=1",
    "last_page_url": "http://example.com/api/product-details?page=3",
    "next_page_url": "http://example.com/api/product-details?page=2",
    "prev_page_url": null,
    "per_page": 10,
    "total": 30
  }
}
- error response : {
  "code": 400,
  "status": "error",
  "data": "Invalid parameters or no products found"
}

### 4. Add to cart API 
- Endpoint :
POST /api/v1/add-to-cart
- Description :
This API adds a product to the user's cart or updates the quantity and total price if the product already exists in the cart.
- Request :
Headers:
Accept: application/json, Authorisation: Bearer your_token
- body : {
   "product_id":17,
    "quantity": 1 
  }
  -success response : {
  "message": "Product added to cart successfully!",
  "product": {
    "id": 1,
    "name": "Smartphone XYZ",
    "price": 299.99,
    "image_url": "http://example.com/images/product/smartphone_xyz.jpg"
  },
  "cart": {
    "id": 5,
    "user_id": 1,
    "cart_items": [
      {
        "id": 10,
        "cart_id": 5,
        "product_id": 1,
        "quantity": 2,
        "total_price": 599.98
      },
      {
        "id": 11,
        "cart_id": 5,
        "product_id": 2,
        "quantity": 1,
        "total_price": 129.99
      }
    ]
  }
}
- error response : {
  "message": "The product_id field is required.",
  "errors": {
    "product_id": [
      "The selected product_id is invalid."
    ]
  }
}

### 5. Place Order API
- Endpoint :
POST /api/v1/place-order
- Description :
This API allows a user to place an order for all the items in their cart. The order includes a summary of the purchased products and the total amount.
- Request :
Headers:
Accept: application/json, Authorisation: Bearer your_token
- body : {
   "user_id":2
  }
- success response : {
  "message": "Order placed successfully!",
  "order": {
    "order_id": 123,
    "status": "pending",
    "total_amount": 729.97,
    "order_date": "2025-01-23 10:30:00",
    "products": [
      {
        "product_id": 1,
        "product_name": "Smartphone XYZ",
        "quantity": 2,
        "total_price": 599.98
      },
      {
        "product_id": 2,
        "product_name": "Smartwatch ABC",
        "quantity": 1,
        "total_price": 129.99
      }
    ]
  }
}
- error response : {
  "code": 400,
  "status": "error",
  "message": "Cart is empty."
}

### 6. Logout API
- Endpoint :
POST /api/v1/logout
- Description :
This API logs out the currently authenticated user by revoking all active tokens.
- Request :
Headers:
Authorisation: Bearer your_token
- body : No parameters are required for this API.
- success response : {
  "code": 200,
  "status": "success",
  "message": "Successfully logged out."
}
- error response : {
  "code": 400,
  "status": "error",
  "message": "No active session found."
}
