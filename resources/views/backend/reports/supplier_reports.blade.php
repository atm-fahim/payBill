@extends('layouts.app')
@section('content')
<style>
    :root {
        --primary-color: #6366f1;
        --primary-dark: #4f46e5;
        --primary-light: #818cf8;
        --secondary-color: #22c55e;
        --secondary-dark: #16a34a;
        --secondary-light: #4ade80;
        --accent-color: #fb923c;
        --accent-dark: #f97316;
        --accent-light: #fdba74;
        --success-color: #14b8a6;
        --info-color: #3b82f6;
        --text-dark: #334155;
        --text-light: #64748b;
        --bg-light: #f8fafc;
        --bg-hover: #f1f5f9;
        --border-color: #e2e8f0;
        --shadow-color: rgba(100, 116, 139, 0.1);
    }

    /* Modern Card Styling */
    .report-card {
        border-radius: 16px;
        box-shadow: 0 4px 20px var(--shadow-color);
        margin-bottom: 2rem;
        background: white;
        border: 2px solid var(--border-color);
        overflow: hidden;
        transition: box-shadow 0.3s ease;
    }

    .report-card:hover {
        box-shadow: 0 8px 30px rgba(99, 102, 241, 0.15);
    }

    .report-header {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        color: white;
        padding: 1.75rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .report-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: 0.3px;
    }

    /* Body Background */
    body {
        background: linear-gradient(135deg, #f0f4ff 0%, #e0e7ff 50%, #fef3c7 100%);
        background-attachment: fixed;
    }

    /* Form Styling */
    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-control, .form-select {
        border-radius: 10px;
        border: 2px solid var(--border-color);
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        font-size: 0.9375rem;
        background-color: white;
    }

    .form-control:hover, .form-select:hover {
        border-color: var(--primary-light);
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        outline: none;
        background-color: #fefeff;
    }

    /* Button Styling */
    .btn-search {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        border: none;
        border-radius: 10px;
        padding: 0.625rem 1.5rem;
        color: white;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.25);
    }

    .btn-search:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.35);
        background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
    }

    .btn-search:active {
        transform: translateY(-1px);
    }

    .btn-print {
        background: linear-gradient(135deg, var(--secondary-color) 0%, var(--secondary-light) 100%);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.875rem 2rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);
        font-size: 1rem;
    }

    .btn-print:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(34, 197, 94, 0.35);
        color: white;
        background: linear-gradient(135deg, var(--secondary-light) 0%, var(--secondary-color) 100%);
    }

    .btn-print:active {
        transform: translateY(-1px);
    }

    .btn-print i {
        font-size: 1.3rem;
    }

    /* Excel Export Button */
    .btn-excel {
        background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 0.875rem 2rem;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.25);
        font-size: 1rem;
    }

    .btn-excel:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(22, 163, 74, 0.35);
        color: white;
        background: linear-gradient(135deg, #15803d 0%, #16a34a 100%);
    }

    .btn-excel:active {
        transform: translateY(-1px);
    }

    .btn-excel i {
        font-size: 1.3rem;
    }

    /* Table Container - Responsive */
    .report-table-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px var(--shadow-color);
        padding: 0;
        margin-top: 1.5rem;
        overflow: hidden;
        border: 2px solid var(--border-color);
    }

    .table-responsive-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .report-table {
        margin-bottom: 0;
        width: 100%;
        min-width: 1000px;
    }

    .report-table thead th {
        background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8125rem;
        padding: 1.125rem 1rem;
        border: none;
        white-space: nowrap;
        letter-spacing: 0.8px;
        position: sticky;
        top: 0;
        z-index: 10;
        text-align: center;
    }

    .report-table tbody tr {
        transition: all 0.25s ease;
        border-bottom: 1px solid var(--border-color);
    }

    .report-table tbody tr:hover {
        background: linear-gradient(to right, #f0fdfa 0%, #ccfbf1 100%);
        transform: scale(1.002);
        box-shadow: 0 3px 10px rgba(20, 184, 166, 0.15);
    }

    .report-table tbody td {
        padding: 1rem;
        vertical-align: middle;
        font-size: 0.9375rem;
        color: var(--text-dark);
        text-align: center;
    }

    .report-table tbody tr:nth-child(even) {
        background-color: var(--bg-light);
    }

    .report-table tfoot tr {
        background: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-light) 100%);
        color: white;
        font-weight: 700;
        font-size: 1rem;
    }

    .report-table tfoot td {
        padding: 1.25rem 1rem;
        border: none;
        font-size: 1rem;
        text-align: center;
    }

    /* Responsive Styles */
    @media (max-width: 1200px) {
        .report-table {
            font-size: 0.875rem;
        }

        .report-table thead th,
        .report-table tbody td,
        .report-table tfoot td {
            padding: 0.75rem 0.5rem;
        }
    }

    @media (max-width: 768px) {
        .report-header {
            padding: 1rem 1.5rem;
        }

        .report-title {
            font-size: 1.25rem;
        }

        .btn-print {
            padding: 0.625rem 1.25rem;
            font-size: 0.9375rem;
        }

        .report-table-container {
            border-radius: 8px;
            margin-top: 1rem;
        }

        .report-table {
            font-size: 0.8125rem;
            min-width: 900px;
        }

        .report-table thead th {
            font-size: 0.75rem;
            padding: 0.75rem 0.5rem;
        }

        .report-table tbody td {
            padding: 0.625rem 0.5rem;
        }

        .form-control, .form-select {
            font-size: 0.875rem;
        }
    }

    @media (max-width: 576px) {
        .report-card {
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .report-header {
            padding: 1rem;
        }

        .report-title {
            font-size: 1.125rem;
        }

        .btn-print {
            width: 100%;
            justify-content: center;
        }

        .report-table {
            min-width: 800px;
        }
    }

    /* Print Header */
    .print-header {
        display: none;
        text-align: center;
        margin-bottom: 2rem;
        padding: 1.5rem;
        background: white;
        border-radius: 12px;
        border-bottom: 4px solid #14b8a6;
    }

    .print-header h1 {
        color: #14b8a6;
        font-size: 2rem;
        margin-bottom: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .print-header p {
        color: #334155;
        margin: 0.5rem 0;
        font-size: 1rem;
    }

    /* Print Styles for Full Report */
    @media print {
        /* Clean print layout - show only table */
        body:not(.printing-invoice) * {
            visibility: hidden;
        }

        body:not(.printing-invoice) {
            background: white !important;
            margin: 0;
            padding: 0;
        }

        /* Hide all non-essential elements */
        body:not(.printing-invoice) .no-print,
        body:not(.printing-invoice) .report-card,
        body:not(.printing-invoice) .invoice-print-container,
        body:not(.printing-invoice) .info-badge {
            display: none !important;
            visibility: hidden !important;
        }

        /* Show only print header and table */
        body:not(.printing-invoice) .print-header,
        body:not(.printing-invoice) .print-header *,
        body:not(.printing-invoice) .report-table-container,
        body:not(.printing-invoice) .report-table-container *,
        body:not(.printing-invoice) .table-responsive-wrapper,
        body:not(.printing-invoice) .table-responsive-wrapper *,
        body:not(.printing-invoice) .report-table,
        body:not(.printing-invoice) .report-table * {
            visibility: visible !important;
        }

        /* Clean header design - Compact */
        body:not(.printing-invoice) .print-header {
            display: block !important;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            text-align: center;
            background: white;
            border-bottom: 3px solid #14b8a6;
            margin: 0;
            padding: 18px 0;
            page-break-after: avoid;
        }

        body:not(.printing-invoice) .print-header h1 {
            color: #14b8a6;
            font-size: 1.6rem;
            margin: 0 0 8px 0;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        body:not(.printing-invoice) .print-header p {
            color: #334155;
            margin: 4px 0;
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Table container positioning */
        body:not(.printing-invoice) .report-table-container {
            display: block !important;
            position: absolute;
            top: 115px;
            left: 0;
            width: 100%;
            margin: 0;
            padding: 0 12px;
            box-shadow: none;
            border: none;
            border-radius: 0;
            background: white;
            overflow: visible !important;
        }

        body:not(.printing-invoice) .table-responsive-wrapper {
            overflow: visible !important;
            padding: 0;
        }

        /* Table styling - Optimized fonts for all columns */
        body:not(.printing-invoice) .PrintReports {
            width: 100% !important;
            max-width: 100% !important;
            min-width: 100% !important;
            border-collapse: collapse;
            font-size: 9px;
            margin: 0;
            table-layout: fixed;
            overflow: visible !important;
        }

        /* Override screen min-width */
        body:not(.printing-invoice) .report-table {
            min-width: 100% !important;
        }

        /* Ensure br tags work in headers */
        body:not(.printing-invoice) .PrintReports thead th br {
            display: block !important;
            content: " " !important;
        }

        body:not(.printing-invoice) .PrintReports thead th {
            background: #14b8a6 !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            border: 1.5px solid #0f766e !important;
            padding: 12px 4px !important;
            font-weight: 700;
            text-align: center;
            font-size: 8.5px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            line-height: 1.5;
            word-wrap: break-word;
            overflow: visible !important;
            vertical-align: middle;
            white-space: normal !important;
            height: auto !important;
            min-height: 50px;
        }

        body:not(.printing-invoice) .PrintReports tbody td {
            border: 1px solid #cbd5e1 !important;
            padding: 10px 4px !important;
            text-align: center;
            font-size: 8.5px;
            color: #1f2937;
            line-height: 1.4;
            font-weight: 500;
            word-wrap: break-word;
            overflow: visible !important;
            vertical-align: middle;
        }

        body:not(.printing-invoice) .PrintReports tbody tr:nth-child(even) {
            background-color: #f0fdfa !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        body:not(.printing-invoice) .PrintReports tbody tr:nth-child(odd) {
            background-color: white !important;
        }

        body:not(.printing-invoice) .PrintReports tfoot tr {
            background: #fb923c !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            font-weight: 700;
        }

        body:not(.printing-invoice) .PrintReports tfoot td {
            border: 1.5px solid #ea580c !important;
            padding: 14px 4px !important;
            font-size: 9.5px;
            font-weight: 700;
            text-align: center;
            overflow: visible !important;
            vertical-align: middle;
        }

        /* Hide action column in print */
        body:not(.printing-invoice) .PrintReports thead th.no-print,
        body:not(.printing-invoice) .PrintReports tbody td.no-print,
        body:not(.printing-invoice) .PrintReports tfoot td.no-print {
            display: none !important;
            visibility: hidden !important;
        }

        @page {
            size: landscape;
            margin: 0.6cm;
        }

        /* Optimize column widths for PrintReports - Total 100% */
        body:not(.printing-invoice) .PrintReports thead th:nth-child(1) {
            width: 3% !important;
            min-width: 3% !important;
        } /* SL */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(2) {
            width: 14% !important;
            min-width: 14% !important;
        } /* Supplier Name */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(3) {
            width: 10% !important;
            min-width: 10% !important;
        } /* Invoice No */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(4) {
            width: 10% !important;
            min-width: 10% !important;
        } /* Account No */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(5) {
            width: 8% !important;
            min-width: 8% !important;
        } /* BDT Rate */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(6) {
            width: 10% !important;
            min-width: 10% !important;
        } /* BDT Amount */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(7) {
            width: 8% !important;
            min-width: 8% !important;
        } /* Ringgit Rate */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(8) {
            width: 10% !important;
            min-width: 10% !important;
        } /* Ringgit Amount */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(9) {
            width: 9% !important;
            min-width: 9% !important;
        } /* Pad Amount */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(10) {
            width: 9% !important;
            min-width: 9% !important;
        } /* Due Amount */

        body:not(.printing-invoice) .PrintReports thead th:nth-child(11) {
            width: 9% !important;
            min-width: 9% !important;
        } /* Payment Method */

        /* Apply same widths to tbody and tfoot cells */
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(1) { width: 3% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(2) { width: 14% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(3) { width: 10% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(4) { width: 10% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(5) { width: 8% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(6) { width: 10% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(7) { width: 8% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(8) { width: 10% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(9) { width: 9% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(10) { width: 9% !important; }
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(11) { width: 9% !important; }

        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(5) { width: 8% !important; }
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(6) { width: 10% !important; }
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(7) { width: 8% !important; }
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(8) { width: 10% !important; }
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(9) { width: 9% !important; }
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(10) { width: 9% !important; }
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(11) { width: 9% !important; }

        /* Force all 11 columns to be visible */
        body:not(.printing-invoice) .PrintReports thead th,
        body:not(.printing-invoice) .PrintReports tbody td,
        body:not(.printing-invoice) .PrintReports tfoot td {
            display: table-cell !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        /* Explicitly ensure columns 10 and 11 are visible */
        body:not(.printing-invoice) .PrintReports thead th:nth-child(10),
        body:not(.printing-invoice) .PrintReports thead th:nth-child(11),
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(10),
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(11),
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(10),
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(11) {
            display: table-cell !important;
            visibility: visible !important;
            opacity: 1 !important;
            max-width: none !important;
        }

        /* Only hide the Action column (12th column) */
        body:not(.printing-invoice) .PrintReports thead th:nth-child(12),
        body:not(.printing-invoice) .PrintReports tbody td:nth-child(12),
        body:not(.printing-invoice) .PrintReports tfoot td:nth-child(12) {
            display: none !important;
            visibility: hidden !important;
        }

        /* Override any .no-print class except on column 12 */
        body:not(.printing-invoice) .PrintReports thead th:not(:nth-child(12)),
        body:not(.printing-invoice) .PrintReports tbody td:not(:nth-child(12)),
        body:not(.printing-invoice) .PrintReports tfoot td:not(:nth-child(12)) {
            display: table-cell !important;
        }
    }

    /* Scrollbar Styling */
    .table-responsive-wrapper::-webkit-scrollbar {
        height: 10px;
    }

    .table-responsive-wrapper::-webkit-scrollbar-track {
        background: linear-gradient(to right, #e0e7ff, #fef3c7);
        border-radius: 10px;
    }

    .table-responsive-wrapper::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        border-radius: 10px;
        border: 2px solid white;
    }

    .table-responsive-wrapper::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
    }

    /* Add subtle animation to table */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .report-table-container {
        animation: fadeIn 0.6s ease-out;
    }

    .report-card {
        animation: fadeIn 0.5s ease-out;
    }

    /* Info Badge */
    .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 100%);
        color: var(--primary-color);
        padding: 0.625rem 1.25rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9375rem;
        border: 2px solid var(--primary-color);
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.15);
    }

    .info-badge i {
        font-size: 1.25rem;
    }

    /* Invoice Print Button */
    .btn-invoice-print {
        background: linear-gradient(135deg, var(--info-color), #60a5fa);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(59, 130, 246, 0.3);
        cursor: pointer;
        margin: 0 2px;
    }

    .btn-invoice-print:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        background: linear-gradient(135deg, #60a5fa, var(--info-color));
    }

    .btn-invoice-print i {
        font-size: 1.1rem;
    }

    .btn-invoice-preview {
        background: linear-gradient(135deg, var(--success-color), #2dd4bf);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 0.75rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(20, 184, 166, 0.3);
        cursor: pointer;
        margin: 0 2px;
    }

    .btn-invoice-preview:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(20, 184, 166, 0.4);
        background: linear-gradient(135deg, #2dd4bf, var(--success-color));
    }

    .btn-invoice-preview i {
        font-size: 1.1rem;
    }

    /* Invoice Print Template */
    .invoice-print-container {
        display: none;
        position: absolute;
        top: -99999px;
        left: -99999px;
        width: 1px;
        height: 1px;
        overflow: hidden;
    }

    body.printing-invoice .invoice-print-container {
        display: block !important;
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: auto !important;
        overflow: visible !important;
        padding: 20px 0;
    }

    body.printing-invoice .no-print,
    body.printing-invoice .report-card,
    body.printing-invoice .report-table-container,
    body.printing-invoice .print-header {
        display: none !important;
    }

    body.printing-invoice {
        overflow-y: auto !important;
    }

    /* Invoice Specific Styles */
    .invoice-wrapper {
        max-width: 900px;
        margin: 40px auto;
        padding: 50px;
        background: white;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
    }

    body.printing-invoice .invoice-wrapper {
        box-shadow: none;
        border-radius: 0;
        padding: 30px;
    }

    /* Invoice Print Styles */
    @media print {
        /* Invoice specific print styles */
        body.printing-invoice {
            background: white !important;
        }

        body.printing-invoice * {
            visibility: hidden !important;
        }

        body.printing-invoice .invoice-print-container,
        body.printing-invoice .invoice-print-container * {
            visibility: visible !important;
        }

        body.printing-invoice .invoice-print-container {
            position: absolute !important;
            left: 0 !important;
            top: 0 !important;
            width: 100% !important;
            display: block !important;
        }

        body.printing-invoice .no-print,
        body.printing-invoice .report-card,
        body.printing-invoice .report-table-container,
        body.printing-invoice .print-header,
        body.printing-invoice #closePreview {
            display: none !important;
            visibility: hidden !important;
        }

        body.printing-invoice .invoice-wrapper {
            max-width: 100%;
            padding: 30px;
            margin: 0;
        }

        body.printing-invoice .invoice-table thead tr {
            background: #14b8a6 !important;
            color: white !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        body.printing-invoice .invoice-table tbody tr {
            border-bottom: 1px solid #e5e7eb !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
            page-break-inside: avoid;
        }

        body.printing-invoice .invoice-table {
            page-break-inside: auto;
        }

        @page {
            margin: 1.5cm;
            size: portrait;
        }
    }
</style>

    <div class="card report-card no-print">
        <div class="report-header">
            <h5 class="report-title">Supplier Payment Reports</h5>
        </div>
        <div class="card-body">
            <form id="paymentForm" class="row g-3" method="POST" action="{{ route('supplier-payment-view') }}" enctype="multipart/form-data">
                @csrf
            <div class="row row-cols-1 g-3 row-cols-lg-auto align-items-center">
                <div class="col">
                    <label class="form-label">{{ __('select Supplier') }}</label>
                    <select class="form-control" name="supplier_id">
                        <option selected value="0">-- select Supplier--</option>
                        @foreach($supplier_info as $v_supp)
                            <option value="{{$v_supp->id}}">{{$v_supp->supplier_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('Payment') }}</label>
                    <select class="form-control" name="payment">
                        <option selected value="0">-- select Payment--</option>
                        <option value="paid">Paid</option>
                        <option value="due">Due</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('Payment Method') }}</label>
                    <select class="form-control" name="payment_method">
                        <option value="0"> -- Select Payment Method--</option>
                        @foreach($method_info as $v_method)
                            <option value="{{$v_method->id}}">{{$v_method->method_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">{{ __('From Date') }}</label>
                    <input name="from_date" type="date" class="form-control"  placeholder="Date">
                </div>
                <div class="col">
                    <label class="form-label">{{ __('To Date') }}</label>
                    <input name="to_date" type="date" class="form-control"  placeholder="Date">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-search px-4"><i class="fadeIn animated bx bx-search-alt"></i></button>
                </div>
            </div><!--end row-->
            </form>
        </div>
    </div>

    <!-- Print Button and Info -->
    <div class="col-lg-12 mb-3 no-print">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="info-badge">
                <i class="bx bx-file"></i>
                <span>Total Records: <strong>{{ $searchInfo ? $searchInfo->count() : 0 }}</strong></span>
            </div>
            <div class="d-flex gap-2">
                <button onclick="exportToExcel()" class="btn btn-excel" {{ !$searchInfo || $searchInfo->count() == 0 ? 'disabled' : '' }}>
                    <i class="bx bxs-file-export"></i>
                    Export to Excel
                </button>
                <button onclick="printReport()" class="btn btn-print" {{ !$searchInfo || $searchInfo->count() == 0 ? 'disabled' : '' }}>
                    <i class="bx bx-printer"></i>
                    Print Full Report
                </button>
            </div>
        </div>
    </div>

    <!-- Print Header (only visible when printing) -->
    <div class="print-header">
        <h1>Supplier Payment Report</h1>
        <p>Generated on: <span id="printDate"></span></p>
        <p>Company Name - Payment Management System</p>
    </div>

    <div class="col-lg-12 report-table-container">
        <div class="table-responsive-wrapper">
            <table class="table table-striped report-table PrintReports">
            <thead>
            <tr>
                <th>SL</th>
                <th>Supplier<br>Name</th>
                <th>Invoice<br>No</th>
                <th>Account<br>No</th>
                <th>BDT<br>Rate</th>
                <th>BDT<br>Amount</th>
                <th>Ringgit<br>Rate</th>
                <th>Ringgit<br>Amount</th>
                <th>Paid<br>Amount</th>
                <th>Due<br>Amount</th>
                <th>Payment<br>Method</th>
                <th class="no-print">Action</th>
            </tr>
            </thead>
            <tbody>
            @if($searchInfo)
            @foreach($searchInfo as $v_src_value)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$v_src_value->supplier_name}}</td>
                <td>{{$v_src_value->invoice_no}}</td>
                <td>{{$v_src_value->supplier_ac_no}}</td>
                <td>{{$v_src_value->bdt_rate}}</td>
                <td>{{$v_src_value->bdt_amount}}</td>
                <td>{{$v_src_value->other_rate}}</td>
                <td>{{$v_src_value->other_amount}}</td>
                <td>{{$v_src_value->supplier_paid_amount}}</td>
                <td>{{$v_src_value->supplier_due_amount}}</td>
                <td>{{$v_src_value->supplier_method_name}}</td>
                <td class="no-print">
                    <button onclick="previewInvoice('{{$v_src_value->invoice_no}}', '{{$v_src_value->supplier_name}}', '{{$v_src_value->supplier_ac_no}}', '{{$v_src_value->bdt_rate}}', '{{$v_src_value->bdt_amount}}', '{{$v_src_value->other_rate}}', '{{$v_src_value->other_amount}}', '{{$v_src_value->supplier_paid_amount}}', '{{$v_src_value->supplier_due_amount}}', '{{$v_src_value->supplier_method_name}}')" class="btn btn-sm btn-invoice-preview" title="Preview Invoice">
                        <i class="bx bx-show"></i>
                    </button>
                    <button onclick="printInvoice('{{$v_src_value->invoice_no}}', '{{$v_src_value->supplier_name}}', '{{$v_src_value->supplier_ac_no}}', '{{$v_src_value->bdt_rate}}', '{{$v_src_value->bdt_amount}}', '{{$v_src_value->other_rate}}', '{{$v_src_value->other_amount}}', '{{$v_src_value->supplier_paid_amount}}', '{{$v_src_value->supplier_due_amount}}', '{{$v_src_value->supplier_method_name}}')" class="btn btn-sm btn-invoice-print" title="Print Invoice">
                        <i class="bx bx-printer"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            @endif
            </tbody>
            <tfoot>
            @if($searchInfo && $searchInfo->count() > 0)
            <tr>
                <td colspan="4" class="text-end"><strong>GRAND TOTAL:</strong></td>
                <td><strong>{{ number_format($searchInfo->sum('bdt_rate'), 2) }}</strong></td>
                <td><strong>{{ number_format($searchInfo->sum('bdt_amount'), 2) }}</strong></td>
                <td><strong>{{ number_format($searchInfo->sum('other_rate'), 2) }}</strong></td>
                <td><strong>{{ number_format($searchInfo->sum('other_amount'), 2) }}</strong></td>
                <td><strong>{{ number_format($searchInfo->sum('supplier_paid_amount'), 2) }}</strong></td>
                <td><strong>{{ number_format($searchInfo->sum('supplier_due_amount'), 2) }}</strong></td>
                <td></td>
                <td class="no-print"></td>
            </tr>
            @endif
            </tfoot>
            </table>
        </div>
    </div>

    <!-- Invoice Print Template (Hidden) -->
    <div id="invoiceTemplate" class="invoice-print-container">
        <div class="invoice-wrapper">
            <!-- Top Section: Company Info and Invoice Details -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 40px;">
                <!-- Company Information -->
                <div style="flex: 1;">
                    <h2 style="color: #1f2937; margin: 0 0 10px 0; font-size: 1.5rem; font-weight: 700;">Your Company Inc.</h2>
                    <p style="margin: 3px 0; color: #6b7280; font-size: 0.95rem;">1234 Company Street</p>
                    <p style="margin: 3px 0; color: #6b7280; font-size: 0.95rem;">City, State 12345</p>
                    <p style="margin: 3px 0; color: #6b7280; font-size: 0.95rem;">Phone: (123) 456-7890</p>
                    <p style="margin: 3px 0; color: #6b7280; font-size: 0.95rem;">Email: info@company.com</p>
                </div>

                <!-- Invoice Title and Details -->
                <div style="text-align: right;">
                    <h1 style="color: #14b8a6; margin: 0 0 20px 0; font-size: 2.5rem; font-weight: 700;">INVOICE</h1>
                    <div style="background: #f8fafc; padding: 15px; border-radius: 8px; text-align: left;">
                        <p style="margin: 5px 0; color: #334155; font-size: 0.9rem;">
                            <strong>Invoice #:</strong> <span id="inv_invoice_no"></span>
                        </p>
                        <p style="margin: 5px 0; color: #334155; font-size: 0.9rem;">
                            <strong>Invoice Date:</strong> <span id="inv_date"></span>
                        </p>
                        <p style="margin: 5px 0; color: #334155; font-size: 0.9rem;">
                            <strong>Payment Method:</strong> <span id="inv_payment_method"></span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bill To Section -->
            <div style="margin-bottom: 30px;">
                <h3 style="color: #1f2937; margin: 0 0 10px 0; font-size: 1.1rem; font-weight: 600;">Bill To:</h3>
                <div style="background: #f8fafc; padding: 15px; border-radius: 8px; border-left: 4px solid #14b8a6;">
                    <p style="margin: 5px 0; color: #1f2937; font-size: 1rem; font-weight: 600;">
                        <span id="inv_supplier_name"></span>
                    </p>
                    <p style="margin: 5px 0; color: #6b7280; font-size: 0.9rem;">
                        Account No: <span id="inv_account_no"></span>
                    </p>
                </div>
            </div>

            <!-- Payment Details Table -->
            <table class="invoice-table" style="width: 100%; border-collapse: collapse; margin-bottom: 30px;">
                <thead>
                    <tr style="background: #14b8a6; color: white;">
                        <th style="padding: 12px; text-align: left; font-weight: 600; font-size: 0.9rem; width: 40%;">DESCRIPTION</th>
                        <th style="padding: 12px; text-align: center; font-weight: 600; font-size: 0.9rem; width: 20%;">RATE</th>
                        <th style="padding: 12px; text-align: right; font-weight: 600; font-size: 0.9rem; width: 20%;">UNIT PRICE</th>
                        <th style="padding: 12px; text-align: right; font-weight: 600; font-size: 0.9rem; width: 20%;">AMOUNT</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 15px 12px; color: #334155; font-size: 0.95rem;"><strong>BDT Payment</strong></td>
                        <td style="padding: 15px 12px; text-align: center; color: #334155; font-size: 0.95rem;">
                            ৳ <span id="inv_bdt_rate"></span>
                        </td>
                        <td style="padding: 15px 12px; text-align: right; color: #334155; font-size: 0.95rem;">
                            ৳ <span id="inv_bdt_rate_copy"></span>
                        </td>
                        <td style="padding: 15px 12px; text-align: right; color: #1f2937; font-weight: 600; font-size: 0.95rem;">
                            ৳ <span id="inv_bdt_amount"></span>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e5e7eb;">
                        <td style="padding: 15px 12px; color: #334155; font-size: 0.95rem;"><strong>Ringgit Payment</strong></td>
                        <td style="padding: 15px 12px; text-align: center; color: #334155; font-size: 0.95rem;">
                            RM <span id="inv_ringgit_rate"></span>
                        </td>
                        <td style="padding: 15px 12px; text-align: right; color: #334155; font-size: 0.95rem;">
                            RM <span id="inv_ringgit_rate_copy"></span>
                        </td>
                        <td style="padding: 15px 12px; text-align: right; color: #1f2937; font-weight: 600; font-size: 0.95rem;">
                            RM <span id="inv_ringgit_amount"></span>
                        </td>
                    </tr>
            </tbody>
        </table>

            <!-- Totals Section -->
            <div style="display: flex; justify-content: flex-end; margin-bottom: 30px;">
                <div style="width: 350px;">
                    <div style="display: flex; justify-content: space-between; padding: 10px; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 0.95rem;">Subtotal:</span>
                        <span style="color: #1f2937; font-weight: 600; font-size: 0.95rem;">৳ <span id="inv_subtotal"></span></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 10px; border-bottom: 1px solid #e5e7eb;">
                        <span style="color: #6b7280; font-size: 0.95rem;">Paid Amount:</span>
                        <span style="color: #16a34a; font-weight: 600; font-size: 0.95rem;">৳ <span id="inv_paid_amount"></span></span>
                    </div>
                    <div style="display: flex; justify-content: space-between; padding: 15px 10px; background: #14b8a6; border-radius: 8px; margin-top: 5px;">
                        <span style="color: white; font-weight: 700; font-size: 1.1rem;">Total Due (BDT):</span>
                        <span style="color: white; font-weight: 700; font-size: 1.2rem;">৳ <span id="inv_due_amount"></span></span>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div style="background: #f0fdf4; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #16a34a;">
                <p style="margin: 5px 0; color: #166534; font-size: 0.95rem;">
                    <strong>Payment Status:</strong> <span style="color: #16a34a; font-weight: 600;">✓ Processed</span>
                </p>
                <p style="margin: 5px 0; color: #166534; font-size: 0.95rem;">
                    <strong>Transaction Reference:</strong> <span id="inv_invoice_no_ref"></span>
                </p>
            </div>

            <!-- Footer -->
            <div style="text-align: center; margin-top: 50px; padding-top: 20px; border-top: 2px solid #e5e7eb;">
                <p style="margin: 5px 0; color: #1f2937; font-size: 1rem; font-weight: 600;">Thank you for your business!</p>
                <p style="margin: 5px 0; color: #6b7280; font-size: 0.9rem;">For any queries, please contact our support team.</p>
                <p style="margin: 15px 0 5px 0; color: #9ca3af; font-size: 0.85rem;">This is a computer-generated invoice.</p>
            </div>
        </div>
    </div>

<script>
    // Function to format numbers with commas
    function formatNumber(num) {
        return parseFloat(num).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    // Function to export table to Excel
    function exportToExcel() {
        try {
            // Get the table
            const table = document.querySelector('.report-table');

            if (!table) {
                alert('Table not found!');
                return;
            }

            // Clone the table to manipulate it
            const clonedTable = table.cloneNode(true);

        // Remove the Action column (last column) from header
        const headerRow = clonedTable.querySelector('thead tr');
        if (headerRow.lastElementChild.classList.contains('no-print')) {
            headerRow.removeChild(headerRow.lastElementChild);
        }

        // Remove the Action column from all body rows
        const bodyRows = clonedTable.querySelectorAll('tbody tr');
        bodyRows.forEach(row => {
            if (row.lastElementChild.classList.contains('no-print')) {
                row.removeChild(row.lastElementChild);
            }
        });

        // Get table HTML
        let tableHTML = clonedTable.outerHTML;

        // Create a temporary div to hold the report title
        const reportTitle = '<h2>Supplier Payment Report</h2><p>Generated on: ' + new Date().toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }) + '</p><br>';

        const fullHTML = reportTitle + tableHTML;

        // Create a Blob with the HTML content
        const blob = new Blob(['\ufeff', fullHTML], {
            type: 'application/vnd.ms-excel'
        });

        // Create download link
        const downloadLink = document.createElement('a');
        downloadLink.href = URL.createObjectURL(blob);

        // Generate filename with current date
        const date = new Date();
        const filename = 'Supplier_Payment_Report_' +
            date.getFullYear() +
            ('0' + (date.getMonth() + 1)).slice(-2) +
            ('0' + date.getDate()).slice(-2) +
            '_' +
            ('0' + date.getHours()).slice(-2) +
            ('0' + date.getMinutes()).slice(-2) +
            '.xls';

        downloadLink.download = filename;

        // Trigger download
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);

        // Show success notification
        showNotification('Excel file downloaded successfully!', 'success');

        } catch (error) {
            console.error('Export to Excel failed:', error);
            alert('Failed to export to Excel. Please try again.');
        }
    }

    // Function to show notification
    function showNotification(message, type = 'success') {
        try {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: ${type === 'success' ? 'linear-gradient(135deg, #16a34a 0%, #22c55e 100%)' : '#ef4444'};
                color: white;
                padding: 15px 25px;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 10000;
                display: flex;
                align-items: center;
                gap: 10px;
                font-weight: 600;
                animation: slideIn 0.3s ease-out;
            `;
            notification.innerHTML = `
                <i class="bx bx-check-circle" style="font-size: 1.5rem;"></i>
                <span>${message}</span>
            `;

            document.body.appendChild(notification);

            // Auto remove after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => {
                    if (notification.parentNode) {
                        document.body.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        } catch (error) {
            console.error('Notification failed:', error);
        }
    }

    // Add animation styles on page load
    (function() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    })();

    // Function to preview invoice before printing
    function previewInvoice(invoiceNo, supplierName, accountNo, bdtRate, bdtAmount, ringgitRate, ringgitAmount, paidAmount, dueAmount, paymentMethod) {
        // Calculate subtotal
        const subtotal = parseFloat(bdtAmount) + parseFloat(ringgitAmount);

        // Populate invoice template with formatted numbers
        document.getElementById('inv_invoice_no').textContent = invoiceNo;
        document.getElementById('inv_invoice_no_ref').textContent = invoiceNo;
        document.getElementById('inv_supplier_name').textContent = supplierName;
        document.getElementById('inv_account_no').textContent = accountNo;

        // Populate rate and amount fields
        document.getElementById('inv_bdt_rate').textContent = formatNumber(bdtRate);
        document.getElementById('inv_bdt_rate_copy').textContent = formatNumber(bdtRate);
        document.getElementById('inv_bdt_amount').textContent = formatNumber(bdtAmount);

        document.getElementById('inv_ringgit_rate').textContent = formatNumber(ringgitRate);
        document.getElementById('inv_ringgit_rate_copy').textContent = formatNumber(ringgitRate);
        document.getElementById('inv_ringgit_amount').textContent = formatNumber(ringgitAmount);

        // Populate totals
        document.getElementById('inv_subtotal').textContent = formatNumber(subtotal);
        document.getElementById('inv_paid_amount').textContent = formatNumber(paidAmount);
        document.getElementById('inv_due_amount').textContent = formatNumber(dueAmount);

        document.getElementById('inv_payment_method').textContent = paymentMethod || 'N/A';

        // Set current date
        const now = new Date();
        const dateOptions = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('inv_date').textContent = now.toLocaleDateString('en-US', dateOptions);

        // Show invoice preview by adding body class
        document.body.classList.add('printing-invoice');

        // Scroll to top to see the invoice
        window.scrollTo(0, 0);

        // Add a close button or message
        const invoiceContainer = document.getElementById('invoiceTemplate');

        // Create close button if it doesn't exist
        if (!document.getElementById('closePreview')) {
            const closeBtn = document.createElement('button');
            closeBtn.id = 'closePreview';
            closeBtn.className = 'btn btn-print';
            closeBtn.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999; display: flex; gap: 10px; align-items: center;';
            closeBtn.innerHTML = '<i class="bx bx-x"></i> Close Preview';
            closeBtn.onclick = function() {
                document.body.classList.remove('printing-invoice');
                this.remove();
            };
            document.body.appendChild(closeBtn);
        }
    }

    // Function to print individual invoice
    function printInvoice(invoiceNo, supplierName, accountNo, bdtRate, bdtAmount, ringgitRate, ringgitAmount, paidAmount, dueAmount, paymentMethod) {
        // Calculate subtotal
        const subtotal = parseFloat(bdtAmount) + parseFloat(ringgitAmount);

        // Populate invoice template with formatted numbers
        document.getElementById('inv_invoice_no').textContent = invoiceNo;
        document.getElementById('inv_invoice_no_ref').textContent = invoiceNo;
        document.getElementById('inv_supplier_name').textContent = supplierName;
        document.getElementById('inv_account_no').textContent = accountNo;

        // Populate rate and amount fields
        document.getElementById('inv_bdt_rate').textContent = formatNumber(bdtRate);
        document.getElementById('inv_bdt_rate_copy').textContent = formatNumber(bdtRate);
        document.getElementById('inv_bdt_amount').textContent = formatNumber(bdtAmount);

        document.getElementById('inv_ringgit_rate').textContent = formatNumber(ringgitRate);
        document.getElementById('inv_ringgit_rate_copy').textContent = formatNumber(ringgitRate);
        document.getElementById('inv_ringgit_amount').textContent = formatNumber(ringgitAmount);

        // Populate totals
        document.getElementById('inv_subtotal').textContent = formatNumber(subtotal);
        document.getElementById('inv_paid_amount').textContent = formatNumber(paidAmount);
        document.getElementById('inv_due_amount').textContent = formatNumber(dueAmount);

        document.getElementById('inv_payment_method').textContent = paymentMethod || 'N/A';

        // Set current date
        const now = new Date();
        const dateOptions = {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('inv_date').textContent = now.toLocaleDateString('en-US', dateOptions);

        // Store original title
        const originalTitle = document.title;

        // Set document title for print
        document.title = 'Invoice - ' + invoiceNo;

        // Add body class to show invoice and hide other content
        document.body.classList.add('printing-invoice');

        // Small delay to ensure the template is populated
        setTimeout(function() {
            // Trigger print dialog
            window.print();

            // Remove body class after printing
            document.body.classList.remove('printing-invoice');

            // Restore original title
            document.title = originalTitle;
        }, 100);
    }

    // Listen for after print event to clean up
    window.addEventListener('afterprint', function() {
        document.body.classList.remove('printing-invoice');
    });

    function printReport() {
        try {
            // Make sure we're not in invoice printing mode
            document.body.classList.remove('printing-invoice');

            // Remove any preview close buttons
            const closeBtn = document.getElementById('closePreview');
            if (closeBtn) {
                closeBtn.remove();
            }

            // Set print date
            const now = new Date();
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            };

            const printDateElement = document.getElementById('printDate');
            if (printDateElement) {
                printDateElement.textContent = now.toLocaleDateString('en-US', options);
            }

            // Store original title
            const originalTitle = document.title;

            // Set document title for print
            document.title = 'Supplier Payment Report - ' + now.toLocaleDateString();

            // Add a small delay to ensure the date is rendered
            setTimeout(function() {
                try {
                    // Trigger print dialog
                    window.print();

                    // Restore original title
                    document.title = originalTitle;
                } catch (printError) {
                    console.error('Print dialog error:', printError);
                    document.title = originalTitle;
                    alert('Failed to open print dialog. Please check your browser settings.');
                }
            }, 200);
        } catch (error) {
            console.error('Print failed:', error);
            alert('Failed to print. Please try again.\nError: ' + error.message);
        }
    }

    // Optional: Add keyboard shortcut Ctrl+P for full report
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 'p') {
            event.preventDefault();
            // Only print full report if we're not already showing invoice
            if (!document.body.classList.contains('printing-invoice')) {
                printReport();
            }
        }
    });

    // Set print date on page load (for quick access)
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        };
        document.getElementById('printDate').textContent = now.toLocaleDateString('en-US', options);
    });
</script>
@endsection
