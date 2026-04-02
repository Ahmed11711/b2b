# 📘 API Guide: Service

This documentation is auto-generated for the **services** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/services` | Bearer |
| View One | `GET` | `/services/{id}` | Bearer |
| Create | `POST` | `/services` | Bearer |
| Update | `PUT` | `/services/{id}` | Bearer |
| Delete | `DELETE` | `/services/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `category_id` | *bigint* | Field from database |
| `city_id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `desc` | *varchar* | Field from database |
| `image` | *varchar* | Field from database |
| `price` | *varchar* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
