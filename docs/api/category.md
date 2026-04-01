# 📘 API Guide: Category

This documentation is auto-generated for the **categories** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/categories` | Bearer |
| View One | `GET` | `/categories/{id}` | Bearer |
| Create | `POST` | `/categories` | Bearer |
| Update | `PUT` | `/categories/{id}` | Bearer |
| Delete | `DELETE` | `/categories/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `name` | *varchar* | Field from database |
| `name_ar` | *varchar* | Field from database |
| `image` | *varchar* | Field from database |
| `sort_order` | *int* | Field from database |
| `is_active` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
