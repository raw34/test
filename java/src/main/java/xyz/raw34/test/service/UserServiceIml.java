package xyz.raw34.test.service;

import org.springframework.stereotype.Service;
import xyz.raw34.test.entity.UserEntity;

@Service
public class UserServiceIml extends BaseService implements UserService{
    @Override
    public UserEntity get(Long id) {
        return null;
    }

    @Override
    public UserEntity mod(UserEntity entity) {
        return null;
    }

    @Override
    public Long add(UserEntity entity) {
        return null;
    }

    @Override
    public boolean del(UserEntity entity) {
        return false;
    }
}
