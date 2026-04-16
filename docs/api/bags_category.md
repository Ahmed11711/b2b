# 📘 API Guide: BagsCategory

This documentation is auto-generated for the **bags_categories** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/bags-categories` | Bearer |
| View One | `GET` | `/bags-categories/{id}` | Bearer |
| Create | `POST` | `/bags-categories` | Bearer |
| Update | `PUT` | `/bags-categories/{id}` | Bearer |
| Delete | `DELETE` | `/bags-categories/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `bag_id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `image` | *varchar* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
