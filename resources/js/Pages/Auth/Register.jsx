import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Register() {    
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  
  useEffect(() => {
    return () => {
      reset('password', 'password_confirmation');
    };
  }, []);
  
  const handleOnChange = (event) => {
    setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
  };
  
  const submit = (e) => {
    e.preventDefault();
    
    post(route('register'));
  };
  
  return (
    <>
      <div class="bg-white py-3 px-10 shadow-sm">
        <a href="/">
          <img src="assets/images/logo-light.png" width={100} alt="" />
        </a>
      </div>
      <Head title="Register" />
      <div className="flex justify-center my-16">
        <div className="w-6/12 ">
          <h1 className='text-center text-[50px] font-bold text-[#5E7B87] mb-4'>
            REGISTRASI
          </h1>
          <form onSubmit={submit}>
            <div>
              <InputLabel htmlFor="name" value="Name" />
              <TextInput
                id="name"
                name="name"
                value={data.name}
                placeholder="Masukan Nama"
                className="mt-1 block w-full"
                autoComplete="name"
                isFocused={true}
                onChange={handleOnChange}
                required
              />
              <InputError message={errors.name} className="mt-2" />
            </div>
            <div className="mt-4">
              <InputLabel htmlFor="email" value="Email" />
              <TextInput
                id="email"
                type="email"
                name="email"
                value={data.email}
                placeholder="Masukan Email"
                className="mt-1 block w-full"
                autoComplete="username"
                onChange={handleOnChange}
                required
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
                placeholder="Masukan Password"
                className="mt-1 block w-full"
                autoComplete="new-password"
                onChange={handleOnChange}
                required
              />
              <InputError message={errors.password} className="mt-2" />
            </div> 
            <div className="mt-4">
              <InputLabel htmlFor="password_confirmation" value="Konfirmasi Password" />
              <TextInput
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                placeholder="Masukan Konfirmasi Password"
                value={data.password_confirmation}
                className="mt-1 block w-full"
                autoComplete="new-password"
                onChange={handleOnChange}
                required
              />
              <InputError message={errors.password_confirmation} className="mt-2" />
            </div>
            <div className="mt-6">
              <PrimaryButton disabled={processing}>
                Register
              </PrimaryButton>
            </div>
          </form>
          <div className="text-center mt-3">
            Sudah punya akun? <a href="/login" className='font-bold text-[#5E7887]'>Masuk</a>
          </div>
        </div>
      </div>
    </>
    );
}