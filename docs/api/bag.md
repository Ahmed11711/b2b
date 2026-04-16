# 📘 API Guide: Bag

This documentation is auto-generated for the **bags** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/bags` | Bearer |
| View One | `GET` | `/bags/{id}` | Bearer |
| Create | `POST` | `/bags` | Bearer |
| Update | `PUT` | `/bags/{id}` | Bearer |
| Delete | `DELETE` | `/bags/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `image` | *varchar* | Field from database |
| `icon` | *varchar* | Field from database |
| `free` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
