import { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';
import NavLink from '@/Components/NavLink';

export default function Login({ status, canResetPassword }) {
  const { data, setData, post, processing, errors, reset } = useForm({
      email: '',
      password: '',
      remember: '',
  });

  useEffect(() => {
      return () => {
          reset('password');
      };
  }, []);

  const handleOnChange = (event) => {
      setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
  };

  const submit = (e) => {
      e.preventDefault();

      post(route('login'));
  };

  return (
    <>
      <div class="bg-white py-3 px-10 shadow-sm">
        <a href="/">
          <img src="assets/images/logo-light.png" width={100} alt="" />
        </a>
      </div>
      <Head title="Log in" />
      <div className="flex justify-center my-20">
        <div className="w-6/12 ">
          <h1 className='text-center text-[50px] font-bold text-[#5E7B87] mb-4'>
            MASUK
          </h1>
          <form onSubmit={submit}>
            <div>
              <InputLabel htmlFor="email" value="Email" />
              <TextInput
                id="email"
                type="email"
                name="email"
                value={data.email}
                className="mt-1 block w-full"
                autoComplete="username"
                isFocused={true}
                placeholder="Masukan Email"
                onChange={handleOnChange}
              />
              <InputError message={errors.email} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="password" value="Password" />
              <TextInput
                id="password"
                type="password"
                name="password"
                value={data.password}
                className="mt-1 block w-full"
                autoComplete="current-password"
                placeholder="Masukan Password"
                onChange={handleOnChange}
              />
              <InputError message={errors.password} className="mt-2" />
            </div>
            <div className="block mt-2 text-right">
              {canResetPassword && (
                <Link
                  href={route('password.request')}
                  className="underline text-[#5E7B87] hover:text-gray-900 no-underline">
                  Lupa Password?
                </Link>
              )}
            </div>
            <div className="mt-6">
              <PrimaryButton disabled={processing}>
                Masuk
              </PrimaryButton>
            </div>
          </form>
          <div className="text-center mt-3">
            Belum punya akun? <a href="/register" className='font-bold text-[#5E7887]'>Registrasi </a>
          </div>
        </div>
      </div>
    </>
  );
}
