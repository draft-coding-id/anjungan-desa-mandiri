<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Desa</title>
  <link rel="icon" href="{{asset('assets/logo.png')}}" type="image/png">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow-x: hidden;
      background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('assets/BackgroundMockupAnjungan.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .header {
      text-align: center;
      border-bottom: 2px solid #ffffff;
      padding: 20px 4px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(5px);
    }

    .header h2 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 28px;
      margin: 0;
      color: #333;
      text-shadow:
        2px 2px 0 white,
        -2px 2px 0 white,
        2px -2px 0 white,
        -2px -2px 0 white,
        3px 3px 0 white,
        -3px 3px 0 white,
        3px -3px 0 white,
        -3px -3px 0 white;
    }
    .sejarah-desa-content {
      line-height: 30px;
    }
    .page-content {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      padding: 20px;
    }

    .container {
      width: 90%;
      max-width: 1200px;
      background: rgba(255, 255, 255, 0.95);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      border: 2px solid #ff9900;
      max-height: 70vh;
      overflow-y: auto;
      scrollbar-width: thin;
      scrollbar-color: #ff9900 #f0f0f0;
    }

    .container::-webkit-scrollbar {
      width: 8px;
    }

    .container::-webkit-scrollbar-track {
      background: #f0f0f0;
      border-radius: 4px;
    }

    .container::-webkit-scrollbar-thumb {
      background: #ff9900;
      border-radius: 4px;
    }

    .main-title {
      text-align: center;
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #333;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-bottom: 3px solid #ff9900;
      padding-bottom: 15px;
    }

    .section {
      margin-bottom: 40px;
      padding: 25px;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      border-radius: 15px;
      border-left: 5px solid #ff9900;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .section-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #ff9900;
      text-transform: uppercase;
      letter-spacing: 1px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title::before {
      content: "●";
      font-size: 20px;
      color: #ff9900;
    }

    .visi-content {
      font-size: 18px;
      line-height: 1.8;
      color: #333;
      text-align: center;
      padding: 20px;
      background: white;
      border-radius: 10px;
      border: 2px dashed #ff9900;
      font-weight: 500;
      font-style: italic;
    }

    .list-container {
      background: white;
      border-radius: 10px;
      padding: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    li {
      position: relative;
      padding: 12px 0 12px 30px;
      margin-bottom: 8px;
      font-size: 16px;
      line-height: 1.6;
      color: #444;
      border-bottom: 1px solid #eee;
      transition: all 0.3s ease;
    }

    li:hover {
      background: #fff8f0;
      padding-left: 35px;
    }

    li::before {
      content: "▶";
      position: absolute;
      left: 0;
      color: #ff9900;
      font-size: 12px;
      top: 15px;
    }

    li:last-child {
      border-bottom: none;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      margin-top: 30px;
    }

    .stat-card {
      background: linear-gradient(135deg, #ff9900 0%, #e68a00 100%);
      color: white;
      padding: 20px;
      border-radius: 12px;
      text-align: center;
      box-shadow: 0 6px 20px rgba(255, 153, 0, 0.3);
      transform: translateY(0);
      transition: transform 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-number {
      font-size: 32px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .stat-label {
      font-size: 14px;
      opacity: 0.9;
    }

    .pembangunan-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
      gap: 25px;
      padding: 20px 0;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }

    .pembangunan-card {
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      transition: all 0.3s ease;
      border: 1px solid #e0e0e0;
      position: relative;
    }

    .pembangunan-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
      border-color: #ff9900;
    }

    .pembangunan-image-placeholder {
      width: 100%;
      height: 200px;
      background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      overflow: hidden;
    }

    .pembangunan-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .pembangunan-card:hover .pembangunan-image {
      transform: scale(1.05);
    }

    .no-image-placeholder {
      text-align: center;
      color: #666;
    }

    .no-image-placeholder span {
      font-size: 40px;
      display: block;
      margin-bottom: 10px;
    }

    .no-image-placeholder p {
      margin: 0;
      font-size: 14px;
    }

    .pembangunan-card-content {
      padding: 20px;
    }

    .pembangunan-card-header {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      margin-bottom: 15px;
      gap: 10px;
    }

    .pembangunan-nama {
      font-size: 18px;
      font-weight: bold;
      color: #333;
      margin: 0;
      line-height: 1.3;
      flex: 1;
    }

    .pembangunan-tahun {
      background: linear-gradient(135deg, #ff9900, #e68a00);
      color: white;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
      white-space: nowrap;
    }

    .pembangunan-anggaran {
      font-size: 20px;
      font-weight: bold;
      color: #28a745;
      margin-bottom: 15px;
      padding: 10px;
      background: linear-gradient(135deg, #d4edda, #c3e6cb);
      border-radius: 8px;
      border-left: 4px solid #28a745;
    }

    .pembangunan-lokasi {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #666;
      font-size: 14px;
      margin-bottom: 20px;
      padding: 8px;
      background: #f8f9fa;
      border-radius: 6px;
    }

    .lokasi-icon {
      color: #ff9900;
      font-size: 16px;
    }

    .pembangunan-actions {
      display: flex;
      gap: 10px;
      margin-bottom: 15px;
      flex-wrap: wrap;
    }

    .pembangunan-btn {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 8px 16px;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.3s ease;
      flex: 1;
      justify-content: center;
      min-width: 80px;
    }

    .pembangunan-btn-detail {
      background: linear-gradient(135deg, #6c757d, #5a6268);
      color: white;
    }

    .pembangunan-btn-detail:hover {
      background: linear-gradient(135deg, #5a6268, #495057);
      transform: translateY(-2px);
    }

    .pembangunan-btn-primary {
      background: linear-gradient(135deg, #ff9900, #e68a00);
      color: white;
    }

    .pembangunan-btn-primary:hover {
      background: linear-gradient(135deg, #e68a00, #cc7700);
      transform: translateY(-2px);
    }

    .pembangunan-meta {
      border-top: 1px solid #eee;
      padding-top: 15px;
    }

    .pembangunan-sumber {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #666;
      font-size: 13px;
    }

    .meta-icon {
      color: #ff9900;
    }

    .empty-state {
      grid-column: 1 / -1;
      text-align: center;
      padding: 60px 20px;
      color: #666;
    }

    .empty-state-icon {
      font-size: 60px;
      margin-bottom: 20px;
      opacity: 0.7;
    }

    .empty-state h2 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #333;
    }

    .empty-state p {
      font-size: 16px;
      line-height: 1.5;
    }

    /* Modal Styles */
    .modal {
      display: flex;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(5px);
      animation: modalFadeIn 0.3s ease-out;
      align-items: center;
      justify-content: center;
    }

    @keyframes modalFadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .modal-content {
      background: white;
      border-radius: 15px;
      width: 90%;
      max-width: 600px;
      max-height: 90vh;
      overflow-y: auto;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      animation: modalSlideIn 0.3s ease-out;
    }

    @keyframes modalSlideIn {
      from {
        transform: translateY(-50px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }

    .modal-header {
      padding: 20px 25px;
      border-bottom: 2px solid #ff9900;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(135deg, #ff9900, #e68a00);
      color: white;
      border-radius: 15px 15px 0 0;
    }

    .modal-header h2 {
      margin: 0;
      font-size: 22px;
      font-weight: bold;
    }

    .close {
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
      color: white;
      transition: color 0.3s ease;
    }

    .close:hover {
      color: #f0f0f0;
    }

    .modal-body {
      padding: 25px;
    }

    .modal-image {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .modal-no-image {
      width: 100%;
      height: 200px;
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      border-radius: 10px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      color: #666;
    }

    .modal-no-image span {
      font-size: 50px;
      margin-bottom: 10px;
    }

    .modal-info {
      display: grid;
      gap: 15px;
      margin-bottom: 20px;
    }

    .modal-info-item {
      padding: 15px;
      background: linear-gradient(135deg, #f8f9fa, #e9ecef);
      border-radius: 10px;
      border-left: 4px solid #ff9900;
    }

    .modal-info-label {
      font-weight: bold;
      color: #ff9900;
      font-size: 14px;
      margin-bottom: 5px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .modal-info-value {
      color: #333;
      font-size: 16px;
      line-height: 1.5;
    }

    .modal-info-value.price {
      font-size: 20px;
      font-weight: bold;
      color: #28a745;
    }

    .modal-info-value.tahun {
      font-weight: bold;
      color: #ff9900;
    }

    .modal-actions {
      text-align: center;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid #eee;
    }

    .modal-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 24px;
      margin: 0 5px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .modal-btn-primary {
      background: linear-gradient(135deg, #ff9900, #e68a00);
      color: white;
    }

    .modal-btn-primary:hover {
      background: linear-gradient(135deg, #e68a00, #cc7700);
      transform: translateY(-2px);
    }

    .footer {
      display: flex;
      flex-direction: column;
      justify-content: center;
      width: 100%;
      height: 150px;
      color: white;
      text-align: center;
      border: 2px solid rgba(0, 0, 0, 0.0);
      padding-bottom: 30px;
    }

    .footer h3 {
      font-family: Arial, Helvetica, sans-serif;
      margin-bottom: 20px;
      text-shadow: 1px 1px 0 white,
        -1px 1px 0 white,
        1px -1px 0 white,
        -1px -1px 0 white,
        2px 2px 0 white,
        -2px 2px 0 white,
        2px -2px 0 white,
        -2px -2px 0 white;
    }

    .button-container-tentang-desa {
      display: flex;
      overflow-x: auto;
      align-items: center;
      justify-content: left;
      height: 100%;
      padding-top: 0px;
      gap: 80px;
      scrollbar-width: none;
    }

    .footer-button {
      display: flex;
      opacity: 60%;
      justify-content: center;
      align-items: center;
      background-color: #ff9900;
      color: white;
      text-align: center;
      padding: 20px 60px;
      border: 1px solid #ffffff;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
      flex-shrink: 0;
      font-size: 20px;
      line-height: 1.3;
      letter-spacing: 0.5px;
      height: 50px;
      max-width: 120px;
    }

    .footer-button.active {
      opacity: 100%;
    }

    .credit {
      position: fixed;
      bottom: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 30px;
      width: 100%;
      font-size: 12px;
      background-color: #ff9900;
      color: white;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        width: 95%;
        padding: 20px;
        margin: 10px;
      }

      .main-title {
        font-size: 24px;
      }

      .section-title {
        font-size: 20px;
      }

      .section {
        padding: 15px;
      }

      .stats-grid {
        grid-template-columns: 1fr;
      }

      .pembangunan-container {
        grid-template-columns: 1fr;
        gap: 20px;
        padding: 15px;
      }

      .pembangunan-card-content {
        padding: 15px;
      }

      .pembangunan-actions {
        flex-direction: column;
      }

      .pembangunan-btn {
        flex: none;
      }

      .modal-content {
        margin: 20px;
        width: calc(100% - 40px);
      }

      .modal-body {
        padding: 20px;
      }
    }
  </style>
</head>

<body>

  <div class="header">
    <h2>
      Tentang Desa Rawapanjang
    </h2>
  </div>
  <div class="page-content">
    @yield('content')
  </div>
  @yield('form-container')
  @yield('back-button')
  @yield('footer')
</body>

</html>