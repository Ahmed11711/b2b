# 📘 API Guide: User

This documentation is auto-generated for the **users** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/api/users` | Bearer |
| View One | `GET` | `/api/users/{id}` | Bearer |
| Create | `POST` | `/api/users` | Bearer |
| Update | `PUT` | `/api/users/{id}` | Bearer |
| Delete | `DELETE` | `/api/users/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `name` | *varchar* | Field from database |
| `email` | *varchar* | Field from database |
| `phone` | *varchar* | Field from database |
| `role` | *enum* | Field from database |
| `email_verified_at` | *timestamp* | Field from database |
| `password` | *varchar* | Field from database |
| `remember_token` | *varchar* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
