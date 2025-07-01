const themeToggle = document.getElementById("theme-toggle");
const root = document.documentElement;

// Load saved theme
const savedTheme = localStorage.getItem("theme") || "dark";
root.setAttribute("data-theme", savedTheme);
document.cookie =
    "theme=" + savedTheme + "; path=/; max-age=" + 60 * 60 * 24 * 30;

// Toggle theme
themeToggle.addEventListener("click", () => {
    const currentTheme = root.getAttribute("data-theme");
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    root.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
    document.cookie =
        "theme=" + newTheme + "; path=/; max-age=" + 60 * 60 * 24 * 30;
});

// Sidebar Management
const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebar-toggle");
const sidebarClose = document.getElementById("sidebar-close");
const mobileOverlay = document.getElementById("mobile-overlay");

function openSidebar() {
    sidebar.classList.add("open");
    mobileOverlay.classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeSidebar() {
    sidebar.classList.remove("open");
    mobileOverlay.classList.remove("active");
    document.body.style.overflow = "";
}

sidebarToggle.addEventListener("click", openSidebar);
sidebarClose.addEventListener("click", closeSidebar);
mobileOverlay.addEventListener("click", closeSidebar);

// Close sidebar on escape key
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && sidebar.classList.contains("open")) {
        closeSidebar();
    }
});

// Search Functionality
const searchInputs = document.querySelectorAll(
    '.form-input[placeholder*="Cari"]'
);

searchInputs.forEach((input) => {
    input.addEventListener("input", (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const currentPage = document.querySelector(".page-section.active");
        const tableRows = currentPage.querySelectorAll(
            ".table tbody tr:not(.no-results-message)"
        );
        const mobileCards = currentPage.querySelectorAll(".mobile-card");

        let hasVisibleRow = false;
        let hasVisibleCard = false;

        tableRows.forEach((row) => {
            const text = row.textContent.toLowerCase();
            const match = text.includes(searchTerm);
            row.style.display = match ? "" : "none";
            if (match) hasVisibleRow = true;
        });

        mobileCards.forEach((card) => {
            const text = card.textContent.toLowerCase();
            const match = text.includes(searchTerm);
            card.style.display = match ? "" : "none";
            if (match) hasVisibleCard = true;
        });

        const noResultsMessages = currentPage.querySelectorAll(
            ".no-results-message"
        );
        noResultsMessages.forEach((msg) => {
            msg.style.display =
                !hasVisibleRow && !hasVisibleCard && searchTerm !== ""
                    ? "block"
                    : "none";
        });
    });
});

// Export Functionality
function exportData(format) {
    const currentPage = document.querySelector(".page-section.active");
    const pageId = currentPage.id;
    const table = currentPage.querySelector(".table");

    if (!table) {
        alert("Tidak ada data untuk diekspor");
        return;
    }

    if (format === "csv") {
        exportToCSV(table, pageId);
    } else if (format === "pdf") {
        exportToPDF(table, pageId);
    }
}

function exportToCSV(table, filename) {
    const rows = table.querySelectorAll("tr");
    const csv = [];

    rows.forEach((row) => {
        const cols = row.querySelectorAll("th, td");
        const rowData = [];

        cols.forEach((col, index) => {
            // Skip action column
            if (index === cols.length - 1) return;

            let text = col.textContent.trim();
            // Clean up text
            text = text.replace(/\s+/g, " ");
            text = text.replace(/"/g, '""');
            rowData.push(`"${text}"`);
        });

        if (rowData.length > 0) {
            csv.push(rowData.join(","));
        }
    });

    const csvContent = csv.join("\n");
    const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
    const link = document.createElement("a");

    if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute(
            "download",
            `${filename}_${new Date().toISOString().split("T")[0]}.csv`
        );
        link.style.visibility = "hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

// Make exportData function globally available
window.exportData = exportData;

// Animation on scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
        }
    });
}, observerOptions);

// Observe cards and tables
document.querySelectorAll(".card, .stat-card").forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(20px)";
    el.style.transition = "opacity 0.6s ease, transform 0.6s ease";
    observer.observe(el);
});

// Responsive table handling
function handleResponsiveTable() {
    const tables = document.querySelectorAll(".table");

    tables.forEach((table) => {
        const headers = table.querySelectorAll("thead th");
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach((row) => {
            const cells = row.querySelectorAll("td");
            cells.forEach((cell, index) => {
                if (headers[index]) {
                    cell.setAttribute("data-label", headers[index].textContent);
                }
            });
        });
    });
}

// Initialize responsive tables
handleResponsiveTable();

// Handle window resize
let resizeTimer;
window.addEventListener("resize", () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        if (window.innerWidth >= 1024 && sidebar.classList.contains("open")) {
            closeSidebar();
        }
    }, 250);
});

// Initialize tooltips for action buttons
const actionButtons = document.querySelectorAll(".action-btn");
actionButtons.forEach((btn) => {
    btn.addEventListener("mouseenter", (e) => {
        const title =
            e.target.getAttribute("title") ||
            e.target.closest(".action-btn").getAttribute("title");
        if (title) {
            // You can implement custom tooltip here
            console.log("Tooltip:", title);
        }
    });
});

// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            target.scrollIntoView({
                behavior: "smooth",
                block: "start",
            });
        }
    });
});

// Auto-save form data to localStorage
const formInputs = document.querySelectorAll("input, select, textarea");
formInputs.forEach((input) => {
    // Load saved data
    const savedValue = localStorage.getItem(`form_${input.name || input.id}`);
    if (savedValue && input.type !== "password") {
        input.value = savedValue;
    }

    // Save data on change
    input.addEventListener("change", () => {
        if (input.type !== "password") {
            localStorage.setItem(`form_${input.name || input.id}`, input.value);
        }
    });
});

function showPage(pageId) {
    // Update navigation
    navLinks.forEach((link) => {
        link.classList.remove("active");
        if (link.getAttribute("data-page") === pageId) {
            link.classList.add("active");
        }
    });

    // Update page content
    pageSections.forEach((section) => {
        section.classList.remove("active");
        if (section.id === pageId) {
            section.classList.add("active");
        }
    });

    // Update header
    const data = pageData[pageId];
    if (data) {
        pageTitle.textContent = data.title;
        pageSubtitle.textContent = data.subtitle;
    }

    // Close sidebar on mobile after navigation
    if (window.innerWidth < 1024) {
        closeSidebar();
    }
}

// Initialize page
document.addEventListener("DOMContentLoaded", () => {
    // Trigger initial animations
    setTimeout(() => {
        document.querySelectorAll(".card, .stat-card").forEach((el) => {
            observer.observe(el);
        });
    }, 100);

    // Set initial active page
    showPage("dashboard");
});

// Keyboard shortcuts
document.addEventListener("keydown", (e) => {
    // Ctrl/Cmd + K for search
    if ((e.ctrlKey || e.metaKey) && e.key === "k") {
        e.preventDefault();
        const activeSearchInput = document.querySelector(
            '.page-section.active .form-input[placeholder*="Cari"]'
        );
        if (activeSearchInput) {
            activeSearchInput.focus();
        }
    }

    // Ctrl/Cmd + E for export
    if ((e.ctrlKey || e.metaKey) && e.key === "e") {
        e.preventDefault();
        exportData("csv");
    }
});

// Print functionality
function printPage() {
    window.print();
}

// Add print styles
const printStyles = `
            @media print {
                .sidebar, .header, .mobile-overlay, .action-buttons {
                    display: none !important;
                }
                .main-content {
                    margin-left: 0 !important;
                }
                .content {
                    padding: 1rem !important;
                }
                .card {
                    box-shadow: none !important;
                    border: 1px solid #000 !important;
                    break-inside: avoid;
                }
                .table {
                    font-size: 12px !important;
                }
            }
        `;

const styleSheet = document.createElement("style");
styleSheet.textContent = printStyles;
document.head.appendChild(styleSheet);

function showNotification(type, title, message) {
    const container = document.getElementById("notification-container");
    const notification = document.createElement("div");
    notification.className = `notification ${type}`;

    const iconMap = {
        success: "fas fa-check-circle",
        error: "fas fa-exclamation-circle",
        warning: "fas fa-exclamation-triangle",
        info: "fas fa-info-circle",
    };

    notification.innerHTML = `
                <i class="notification-icon ${iconMap[type]}"></i>
                <div class="notification-content">
                    <div class="notification-title">${title}</div>
                    <div class="notification-message">${message}</div>
                </div>
                <button class="notification-close" onclick="removeNotification(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;

    container.appendChild(notification);

    // Show notification
    setTimeout(() => {
        notification.classList.add("show");
    }, 300);

    // Auto remove after 5 seconds
    setTimeout(() => {
        removeNotification(notification.querySelector(".notification-close"));
    }, 4000);
}

function removeNotification(button) {
    const notification = button.closest(".notification");
    notification.classList.remove("show");

    setTimeout(() => {
        notification.remove();
    }, 300);
}
function openModal(modalId, id = null, mode = null) {
    const modal = document.getElementById(modalId);
    if (modal) {
        const form = modal.querySelector("form");
        if (form && (!id || mode !== "Edit")) {
            form.reset();
        }

        // Kalau bukan dari session (bukan reload akibat validasi), bersihkan error
        if (id && mode) {
            const errorElements = modal.querySelectorAll(
                ".form-error, .invalid-feedback"
            );
            errorElements.forEach((el) => el.remove());

            const invalidInputs = modal.querySelectorAll(".is-invalid");
            invalidInputs.forEach((input) =>
                input.classList.remove("is-invalid")
            );
        }

        modal.classList.add("active");
        document.body.style.overflow = "hidden";
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove("active");
        document.body.style.overflow = "";

        // Reset form
        const form = modal.querySelector("form");
        if (form) {
            form.reset();
        }

        // Hapus semua pesan error
        const errorElements = modal.querySelectorAll(
            ".form-error, .invalid-feedback, .is-invalid"
        );
        errorElements.forEach((el) => el.remove());

        // Hapus class is-invalid dari input
        const invalidInputs = modal.querySelectorAll(".is-invalid");
        invalidInputs.forEach((input) => input.classList.remove("is-invalid"));
    }
}

function confirmDelete() {
    if (!currentDeleteData) return;

    showLoading();

    // Simulate API call
    setTimeout(() => {
        hideLoading();
        closeModal("delete-modal");
        showNotification(
            "success",
            "Berhasil",
            `Data ${currentDeleteData.name} berhasil dihapus`
        );

        // Refresh table data here
        // refreshTableData(currentDeleteData.type);

        currentDeleteData = null;
    }, 1000);
}

function showLoading() {
    const overlay = document.getElementById("loading-overlay");
    overlay.classList.add("active");
}

function hideLoading() {
    const overlay = document.getElementById("loading-overlay");
    overlay.classList.remove("active");
}
const userProfile = document.getElementById("user-profile");
const profileDropdown = document.getElementById("profile-dropdown");

userProfile.addEventListener("click", (e) => {
    e.stopPropagation();
    profileDropdown.classList.toggle("show");
});

// Close dropdown when clicking outside
document.addEventListener("click", () => {
    profileDropdown.classList.remove("show");
});

profileDropdown.addEventListener("click", (e) => {
    e.stopPropagation();
});
