import { useState } from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import Dropdown from '@/Components/Dropdown';
import NavLink from '@/Components/NavLink';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';
import { Link } from '@inertiajs/react';

export default function Authenticated({ auth, header, children }) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] = useState(false);
    const [isDropdownOpen, setDropdownOpen] = useState(false);

    const toggleDropdown = () => {
        setDropdownOpen(!isDropdownOpen);
    };

    return (
        <>
  
        <link rel="icon" href="/assets/images/logo-top.png" type="image/x-icon"/>
        <div className="min-h-screen bg-white">
            {/* <nav className="bg-green-200 border-b border-gray-100">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="flex justify-between h-16">
                <div className="flex">
                    <div className="shrink-0 flex items-center">
                        <Link href="/">
                            <ApplicationLogo className="block h-9 w-auto fill-current text-gray-800" />
                        </Link>
                    </div>

                    <div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <NavLink href={route('dashboard')} active={route().current('dashboard')}>
                            Home
                        </NavLink>
                    </div>
                </div>

                <div className="hidden sm:flex sm:items-center sm:ml-6">
                    <div className="ml-3 relative">
                        <Dropdown>
                            <Dropdown.Trigger>
                                <span className="inline-flex rounded-md">
                                    <button
                                        type="button"
                                        className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                        {auth.user.name}

                                        <svg
                                            className="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fillRule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clipRule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </Dropdown.Trigger>

                            <Dropdown.Content>
                                <Dropdown.Link href={route('profile.edit')}>Profile</Dropdown.Link>
                                <Dropdown.Link href={route('logout')} method="post" as="button">
                                    Log Out
                                </Dropdown.Link>
                            </Dropdown.Content>
                        </Dropdown>
                    </div>
                </div>

                <div className="-mr-2 flex items-center sm:hidden">
                    <button
                        onClick={() => setShowingNavigationDropdown((previousState) => !previousState)}
                        className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                    >
                        <svg className="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path
                                className={!showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                            <path
                                className={showingNavigationDropdown ? 'inline-flex' : 'hidden'}
                                strokeLinecap="round"
                                strokeLinejoin="round"
                                strokeWidth="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div className={(showingNavigationDropdown ? 'block' : 'hidden') + ' sm:hidden'}>
            <div className="pt-2 pb-3 space-y-1">
                <ResponsiveNavLink href={route('dashboard')} active={route().current('dashboard')}>
                    Dashboard
                </ResponsiveNavLink>
            </div>

            <div className="pt-4 pb-1 border-t border-gray-200">
                <div className="px-4">
                    <div className="font-medium text-base text-gray-800">
                        {auth.user.name}
                    </div>
                    <div className="font-medium text-sm text-gray-500">{auth.user.email}</div>
                </div>

                <div className="mt-3 space-y-1">
                    <ResponsiveNavLink href={route('profile.edit')}>Profile</ResponsiveNavLink>
                    <ResponsiveNavLink method="post" href={route('logout')} as="button">
                        Log Out
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav> */}

            {header && (
                <header className="bg-[#3E6D81] shadow">
                    {/* <div className="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">{header}</div> */}
                    <div className="py-3 px-16 container mx-auto flex justify-between items-center">
                        <a className="navbar-brand" href="/home">
                            <img src="./assets/images/logo-dark.png" alt="logo-image" width="90%" />
                        </a>
                        <div className="space-x-16 text-white">
                            <a href="/">Koleksi Soal</a>
                            <a href="/generate">Buat Soal</a>
                            <a href="/cbt">CBT</a>
                            <a href="/learn">Belajar</a>
                            <a href="/help">Bantuan</a>
                            <a href="/about">Tentang</a>
                            <a onClick={toggleDropdown}>
                                <button className="absolute">
                                    <img src="/assets/images/profile.png" width={'25px'} alt="" />
                                </button>
                                {isDropdownOpen && (
                                <div className="absolute bg-white p-4 rounded border text-black w-48 mt-2 right-20">
                                    <ul>
                                        <li><a href="/profile">Profile</a></li>
                                        <li className='py-2'><a href="/settings">Rp.490.000</a></li>
                                        <li><a href="/logout">Logout</a></li>
                                    </ul>
                                </div>
                                )}
                            </a>
                        </div> 
                        {/* <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <iconify-icon icon="carbon:user-avatar-filled-alt" style="font-size: 20px;"></iconify-icon>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="/profile">
                                                <iconify-icon icon="carbon:user"></iconify-icon>
                                                Profil
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/balance">
                                                <iconify-icon icon="ion:wallet-outline"></iconify-icon>
                                                Rp{{ number_format(Auth::user()->userBalance->balance, 0, ',', '.') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="/logout">
                                                <iconify-icon inline icon="carbon:logout"></iconify-icon>
                                                Keluar
                                            </a>
                                        </li>
                                    </ul>
                                </li>  */}
                    </div>
                </header>
            )}
            <main>{children}</main>
        </div></>
    );
}
