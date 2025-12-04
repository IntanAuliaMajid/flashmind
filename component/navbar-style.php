<style>
    /* Foto navbar */
    body { font-family: 'Quicksand', sans-serif; }
    .nav-profile-image {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
    }
    .logo {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    /* Foto profil besar */
    .container-hover {
        position: relative;
        width: 96px;
        height: 96px;
        cursor: pointer;
        border-radius: 50%;
        overflow: hidden;
    }

    .profile-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transition: 0.3s ease;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        opacity: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0,0,0,0.5);
        border-radius: 50%;
        transition: 0.3s ease;
    }

    .container-hover:hover .overlay {
        opacity: 1;
    }

    .container-hover:hover .profile-image {
        filter: brightness(0.7);
    }

    .text-overlay {
        color: white;
        font-weight: 600;
        font-size: 14px;
    }
</style>
