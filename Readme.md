# SmartTrack - Student Performance & Attendance Management Portal

**SmartTrack** is a dynamic, web-based management system designed to streamline academic tracking, attendance monitoring, and administrative tasks for educational institutions. The platform provides secure, role-based dashboards for Students, Teachers, and Administrators, featuring interactive data visualizations to analyze student attendance and performance metrics effectively.

---

## 🚀 Key Features

* **Role-Based Access Control (RBAC):**
  * **Admin Portal:** Manage student and teacher details, system settings, and administrative operations.
  * **Teacher Portal:** Record and update student attendance and subject records.
  * **Student Portal:** View individual attendance reports, monthly performance metrics, and course details.
* **Interactive Data Visualization:** Integrated with Google Charts API to generate visual column charts for attendance trends alongside detailed tabular summaries.
* **Secure Authentication:** User login and session management for students, teachers, and admins.
* **Responsive User Interface:** Custom CSS styling with custom background layouts and intuitive controls.

---

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3, JavaScript
* **Data Visualization:** Google Charts API
* **Backend:** PHP
* **Database:** MySQL

---

## 📁 Project Structure

```text
SmartTrack/
├── adminLayout.css          # Styling for Admin login interface
├── adminNav.css             # Navigation styling for Admin portal
├── admin_chart.css          # Layout styles for administrative charts
├── admin_login.php          # Administrative login page
├── admin_portal.php         # Central Admin management portal
├── attend_chart.css         # Styling for attendance charts and tables
├── attendance_chart.php     # Attendance analytics rendering (Google Charts + Table)
├── images/                  # Project assets and UI image graphics
└── README.md                # Project documentation
```

---

## ⚙️ Installation & Setup

1. **Prerequisites:**
   * Install a local web server environment like **XAMPP**, **WAMP**, or **MAMP** with PHP and MySQL support.

2. **Clone / Download the Repository:**
   ```bash
   git clone https://github.com/your-username/SmartTrack.git
   ```
   * Move the project folder to your local server directory (e.g., `htdocs/` for XAMPP).

3. **Database Configuration:**
   * Open **phpMyAdmin** (`http://localhost/phpmyadmin`).
   * Create a new database named `spt`.
   * Import the corresponding database schema (ensure tables such as `attendance` and user credentials tables are configured).

4. **Run the Application:**
   * Start Apache and MySQL in your XAMPP/WAMP control panel.
   * Open your browser and navigate to:
     ```text
     http://localhost/SmartTrack/admin_login.php
     ```

---

## 📊 Database Schema Highlights

### `attendance` Table Structure Example
| Column Name | Type | Description |
| :--- | :--- | :--- |
| `sub_id` | VARCHAR | Subject Identification Code |
| `month` | VARCHAR | Month of tracking |
| `total` | INT | Total conduct hours/classes |
| `attendance`| INT | Attended hours by student |

---

## 🤝 Contributing

Contributions are always welcome!
1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

Distributed under the MIT License. See `LICENSE` for more information.