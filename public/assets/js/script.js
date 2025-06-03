const themeToggle = document.getElementById("theme-toggle");
const root = document.documentElement;

// Load saved theme
const savedTheme = localStorage.getItem("theme") || "dark";
root.setAttribute("data-theme", savedTheme);
document.cookie = "theme=" + savedTheme + "; path=/; max-age=" + 60 * 60 * 24 * 30;

// Toggle theme
themeToggle.addEventListener("click", () => {
    const currentTheme = root.getAttribute("data-theme");
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    root.setAttribute("data-theme", newTheme);
    localStorage.setItem("theme", newTheme);
    document.cookie = "theme=" + newTheme + "; path=/; max-age=" + 60 * 60 * 24 * 30;
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
        const tableRows = currentPage.querySelectorAll(".table tbody tr");
        const mobileCards = currentPage.querySelectorAll(".mobile-card");

        // Filter table rows
        tableRows.forEach((row) => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? "" : "none";
        });

        // Filter mobile cards
        mobileCards.forEach((card) => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? "" : "none";
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

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        const form = modal.querySelector('form');
        if (form) {
            form.reset();
        }

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
        
        const form = modal.querySelector('form');
        if (form) {
            form.reset();
        }
    }
}